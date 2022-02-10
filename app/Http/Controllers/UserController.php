<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use App\Models\PsAor;
use App\Models\PsAuth;
use App\Models\PsEndpoint;
use Doctrine\DBAL\Query\QueryException as QueryQueryException;
use Illuminate\Database\Events\QueryExecuted;
use RuntimeException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    private function getNewEndpoint(Request $request)
    {
        $newEndpoint = new PsEndpoint;

        $newEndpoint->id = $request->user["username"];
        $newEndpoint->transport = Config::get("consts.asterisk_config.udp_transport");
        $newEndpoint->aors = $request->user["username"];
        $newEndpoint->auth = $request->user["username"];
        $newEndpoint->context = Config::get("consts.asterisk_config.main_context");
        $newEndpoint->allow = Config::get("consts.asterisk_config.allow");
        $newEndpoint->disallow = Config::get("consts.asterisk_config.disallow");
        $newEndpoint->direct_media = Config::get("consts.asterisk_config.direct_media");

        return $newEndpoint;
    }

    private function getNewAor(Request $request)
    {
        $newAor = new PsAor;

        $newAor->id = $request->user["username"];

        return $newAor;
    }

    private function getNewAuth(Request $request)
    {
        $newAuth = new PsAuth;

        $newAuth->auth_type = Config::get("consts.asterisk_config.auth_type");
        $newAuth->password = $request->user["password"];
        $newAuth->id = $request->user["username"];
        $newAuth->username = $request->user["username"];

        return $newAuth;

    }

    private function cleanInCompleteUser(string $id) 
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
            $this->cleanInCompleteUser($request->user["username"]);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
