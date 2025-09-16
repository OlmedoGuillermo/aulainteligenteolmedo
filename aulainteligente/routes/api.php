<?php
    // routes/api.php

   
    use Illuminate\Support\Facades\Route;

    route::post('/sensores', [SensorController::class, 'store']);

