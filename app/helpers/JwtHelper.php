<?php

namespace App\Helpers;

use App\Models\Member_model;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\DB;
use App\Models\Token_model;
use App\Models\User_model;
use Exception;

class JwtHelper
{
    private static function getJwtSecret()
    {
        return env("JWT_SECRET");
    }

    public static function generateAuthToken($mem_id, $email, $type)
    {
        try {
            $secret = self::getJwtSecret();
            // pr($secret);
            // Verify the secret is a valid string
            if (!is_string($secret) || empty($secret)) {
                throw new Exception('Invalid JWT secret key');
            }
            $currentTime = time();
            $expiryTimestamp = $currentTime + (6 * 30 * 24 * 60 * 60);
            $payload = [
                'mid' => $mem_id,
                'mee' => $email,
                'mtp' => $type,
                'iat' => $currentTime,
                'exp' => $expiryTimestamp // 6 months expiration
            ];

            $userToken = JWT::encode($payload, $secret, 'HS256');

            $token_array = [
                'mem_type' => $type,
                'token' => $userToken,
                'mem_id' => $mem_id,
                'expiry_date' => date('Y-m-d H:i:s', $expiryTimestamp),
            ];

            // DB::table('tokens')->insert($token_array);
            Token_model::create($token_array);

            return $userToken;
        } catch (Exception $e) {
            // Log the error for debugging
            pr($e->getMessage());
            // error_log('JWT Error: ' . $e->getMessage());
            return null;
        }
    }

    public static function verifyAuthToken($token)
    {
        try {
            $decoded = JWT::decode($token, new Key(self::getJwtSecret(), 'HS256'));
            // pr(self::getJwtSecret());
            if ($decoded->exp < time()) {
                return ['status' => false, 'message' => 'Token has expired'];
            }

            // pr($decoded);
            // Check if member exists and is active
            // $memData = Member_model::where('id', $decoded->mid)
            $memData = User_model::where('id', $decoded->mid)
                ->where('mem_email', $decoded->mee)
                ->exists();

            // pr($memData);
            if (!$memData) {
                return ['status' => false, 'message' => 'Invalid member ID or account inactive'];
            }

            // Check if token exists in database
            $tokenExists = Token_model::where('token', $token)
                ->where('mem_id', $decoded->mid)
                ->exists();

            if (!$tokenExists) {
                return ['message' => 'Token not found or expired'];
            }

            // Return with proper payload and member data
            return [
                'id' => $decoded->mid,
                'mem_email' => $decoded->mee,
                'mem_type' => $decoded->mtp
            ];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => 'Invalid token: ' . $e->getMessage()];
        }
    }
}
