<?php
            $connectionInfo = array("UID" => "User1", "pwd" => "Project1", "Database" => "gtfsdata", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
            $serverName = "lunar-rover.database.windows.net,1433";
            $conn = sqlsrv_connect($serverName, $connectionInfo);
            ?>