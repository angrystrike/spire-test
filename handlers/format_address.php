<?php

require_once '../models/USPS.php';

echo USPS::formatAddress($_POST);