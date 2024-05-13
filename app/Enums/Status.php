<?php
    namespace App\Enums; 

    Enum Status: string {
        case INIT = 'init'; 
        case PENDING = 'pending'; 
        case SUCESS = 'sucess'; 
        case REJECTED = 'rejected'; 
    }