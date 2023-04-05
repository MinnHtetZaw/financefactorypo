<?php

namespace App\Services;

use App\User;
use App\Patient;
use App\LinkedSocialAccount;
use Laravel\Socialite\Two\User as ProviderUser;

class SocialAccountsService
{
    public function findOrCreate(ProviderUser $providerUser, string $provider): User{

        $linkedSocialAccount = \App\LinkedSocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();

        if(isset($linkedSocialAccount)) {
            
            return $linkedSocialAccount->user;
        } 
        else {

            $user = null;

            if ($email = $providerUser->getEmail()) {

                $user = User::where('email', $email)->first();
            }

            if (!isset($user)) {

                $user = User::create([
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                ]);

                $patient_code =  "BHS-PTT" . sprintf("%06s", $user->id);

                $image = $providerUser->avatar;
                
                $patient = Patient::create([
                    'patient_code' => $patient_code,
                    'name' => $user->name,
                    'photo' => $image,
                    'status' => 0,
                    'user_id' => $user->id,
                ]);

            }

            $user->linkedSocialAccounts()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
            ]);

            return $user;
        }
    }
}
