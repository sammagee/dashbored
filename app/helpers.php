<?php

function is_active($path)
{
    return Route::currentRouteName() === $path;
}
