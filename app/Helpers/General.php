<?php

use App\Models\Post;

/**
 * 
 * @return global functions to Crud image
 */
function uploadImage($folder , $image) 
{
    $image->store('/',$folder);
    $filename = $image->hashName();
    $path = 'image/' . $folder . '/' . $filename;
    return $path;
}

/**
 * 
 * @return global functions to create single page (links)
 */
function getPages()
{
    $pages = Post::where('post_type', 'page')->where('is_published', '1')->get();
    return $pages;
}