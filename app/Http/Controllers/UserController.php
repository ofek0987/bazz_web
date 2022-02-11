<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use App\Models\PsAor;
use App\Models\PsAuth;
use App\Models\PsEndpoint;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

class UserController extends Controller
{
    private function getNewEndpoint(Request $request)
    {
        $newEndpoint = new PsEndpoint;

        $newEndpoint->id = $request->user["username"];
        $newEndpoint->transport = Config::get("asterisk.udp_transport");
        $newEndpoint->aors = $request->user["username"];
        $newEndpoint->auth = $request->user["username"];
        $newEndpoint->context = Config::get("asterisk.main_context");
        $newEndpoint->allow = Config::get("asterisk.allow");
        $newEndpoint->disallow = Config::get("asterisk.disallow");
        $newEndpoint->direct_media = Config::get("asterisk.direct_media");

        return $newEndpoint;
    }

    private function getNewAor(Request $request)
    {
        $newAor = new PsAor;

        $newAor->id = $request->user["username"];
        $newAor->max_contacts = Config::get("asterisk.max_contacts");

        return $newAor;
    }

    private function getNewAuth(Request $request)
    {
        $newAuth = new PsAuth;

        $newAuth->auth_type = Config::get("asterisk.auth_type");
        $newAuth->password = $request->user["password"];
        $newAuth->id = $request->user["username"];
        $newAuth->username = $request->user["username"];

        return $newAuth;

    }

    private function cleanIncompleteUser(string $id) 
    {
        if (PsEndpoint::where("id", $id)->exists())
        {
            PsEndpoint::where("id", $id)->delete();
        }

        if (PsAor::where("id", $id)->exists())
        {
            PsAor::where("id", $id)->delete();
        }

        if (PsAuth::where("id", $id)->exists())
        {
            PsAuth::where("id", $id)->delete();
        }
    }

    private function isUserCompleteOnDb(string $id)
    {
        return PsEndpoint::where("id", $id)->exists() && PsAor::where("id", $id)->exists() && PsAuth::where("id", $id)->exists();
    }

    private function handleSaveFail(Request $request)
    {   
        if (!$this->isUserCompleteOnDb($request->user["username"]))
        {
            $this->cleanIncompleteUser($request->user["username"]);
        }
        throw new RuntimeException;
    }

    private function saveNewUser(Request $request)
    {

        $newEndpoint = $this->getNewEndpoint($request);
        $newAor = $this->getNewAor($request);
        $newAuth = $this->getNewAuth($request);
        
        try 
        {
            $isAorSaved = $newAor->save();
            $isAuthSaved = $newAuth->save();
            $isEndpointSaved = $newEndpoint->save();
        }
        catch (QueryException $e)
        {
        
            return $this->handleSaveFail($request);
        }
        
        if (!$isAorSaved || !$isAuthSaved || !$isEndpointSaved)
        {
            return $this->handleSaveFail($request);
        }
    }

    public function store(Request $request)
    {   
        $validationSchema = Config::get("validation.schemas.store");
        if (Validator::make($request->all(), $validationSchema)->fails())
        {
            return new Response("Invalid request", 400);    
        }
        if ($this->isUserCompleteOnDb($request->user["username"]))
        {
            return new Response("user ".$request->user["username"]." already exists", 400);
        }
        try
        {
            $this->saveNewUser($request);
        }
        catch (RuntimeException $e)
        {
            return new Response("user ".$request->user["username"]." did not created", 500);
        }

        return new Response("user ".$request->user["username"]." created!", 200);

    }

    public function search(Request $request)
    {
        $validationSchema = Config::get("validation.schemas.search");
        if (Validator::make($request->all(), $validationSchema)->fails())
        {
            return new Response("Invalid request", 400);    
        }
        return PsEndpoint::where("id", "like", "%".$request->match["username"]."%")->get(["id"]);
    }

    public function changePassword(Request $request)
    {
        $validationSchema = Config::get("validation.schemas.change_password");
        if (Validator::make($request->all(), $validationSchema)->fails())
        {
            return new Response("Invalid request", 400);    
        }
        $userAuth = PsAuth::find($request["username"]);
        if (!$userAuth)
        {
            return new Response("no username ".$request["username"], 400);
        }
        if ($userAuth->password != $request["oldPassword"])
        { 
            return new Response("old password does not match", 400);
        }
        $userAuth->password = $request["newPassword"];
        if (!$userAuth->save())
        {
            return new Response("password did not changed", 500);
        }
        return new Response("password changed!", 200);
            
    }
}
