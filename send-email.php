<?php
$content = $_POST; /* receiving SimpleCart order array */
$body = ''; /* declaring the email body */

$firstname = ''; /* extra field variable */
$lastname = ''; /* extra field variable */
$email = ''; /* extra field variable */
$address = '';
$phone = ''; /* extra field variable */
$comments = ''; /* extra field variable */

$body .= '=================================='."\n";
$body .= "Prenume: ".$content[$firstname]."\n"; /* using extra field variable */
$body .= "Nume de familie: ".$content[$lastname]."\n"; /* using extra field variable */
$body .= "Adresa: ".$content[$address]."\n"; /* using extra field variable */
$body .= "Email: ".$content[$email]."\n"; /* using extra field variable */
$body .= "Numar de telefon: ".$content[$phone]."\n"; /* using extra field variable */
$body .= 'Has placed the following order:'."\n";
$body .= "\n";
$body .= '=================================='."\n";
/* starting the loop to get all orders from the stored array */
for($i=1; $i < $content['itemCount'] + 1; $i++) {
$name = 'item_name_'.$i; /* product name variable */
$quantity = 'item_quantity_'.$i; /* product quantity variable */
$price = 'item_price_'.$i; /* product price variable */
$total = $content[$quantity]*$content[$price]; /* product total price variable (price*quantity) */
$grandTotal += $total; /* accumulating the total of all items */
$body .= 'Comanda#'.$i.': '.$content[$name]."\n".'Cantitate '.$content[$quantity].' --- Pret per bucata $'.number_format($content[$price], 2, '.', '')."\n".'Sub-total $'.number_format($total, 2, '.', '')."\n"; /* creating a semantic format for each ordered product */
$body .= '=================================='."\n";
}
/* ending the loop to get all orders from the stored array */
$body .= 'Total: $'.number_format($grandTotal, 2, '.', '')."\n"; /* total amount of the order */
$body .= '=================================='."\n";
$body .= "\n";
$body .= "Mesaj(optional): ".$content[$comments]."\n"; /* using extra field variable */
$headers    = "Content-Type: text/plain; charset=iso-8859-1\n";
$headers    .= "From: ".$content[$firstname]." ".$content[$lastname]."  <".$content[$email].">\n";
$recipient  = "pink.butterfly.14@hotmail.com";
$subject    = "Comanda noua pentru K";
mail($recipient, $subject, $body, $headers); /* building the mail() function */
header("https://e-commerce203.blogspot.com/p/success.html"); /* declaring the page to redirect if the mail is sent successfully */

