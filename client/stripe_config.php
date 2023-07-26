<?php 
 require('stripe-php-master/init.php');

 $publisher_key="pk_test_51JlDAzF40gdBNDIaMgu9RmYBPjuwaL6KiuxaPEFkT2hGKjGA8nwQ3aVHxZqSjc60NcmMy1uzYTkyhNXzd1rTi15H00uclELlzL";

 $secret_key="sk_test_51JlDAzF40gdBNDIamKXhNYOUiPoJTApxkBkIU2cZ2SBDQ6mKg0abWd9L2uJHXVEFDI2l0n6nsiDvMuC4c7GzY51c00EFEMb462";

 \Stripe\Stripe:: setApiKey($secret_key);


 ?>