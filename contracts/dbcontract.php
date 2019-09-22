<?php

//this contact is used for the database classes. It basically forces the databases to implement the singleton pattern.

interface databaseContract
{
    public static function get_instance() : object;
} 