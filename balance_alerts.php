<?php
include("includes/config.php");
require('mailer.php');
        
                                                        $username = 'bst.vidhya';
                                                        $password = 'Vidhya@321';
                                                        $msisdn = "447418415000";
                                                        $Moniker ="eu8";
                                                        $xmlData = '<get-promotion-status version="1"><authentication><username>bst.vidhya</username><password>Vidhya@321</password></authentication><number>' . $msisdn . '</number><promotion>' . $Moniker . '</promotion></get-promotion-status>';

                                                        // Initialize cURL session
                                                        $ch = curl_init();

                                                        // Set cURL options
                                                        curl_setopt($ch, CURLOPT_URL, 'https://bst.s.im/pip/api/execute.mth');
                                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                        curl_setopt($ch, CURLOPT_POST, true);
                                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlData);
                                                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                                            'Content-Type: application/xml',
                                                            'Authorization: Basic ' . base64_encode($username . ':' . $password)
                                                        ));

                                                        // Execute cURL request
                                                        $response = curl_exec($ch);

                                                        // Check for errors
                                                        if (curl_errno($ch)) {
                                                            echo 'Error: ' . curl_error($ch);
                                                        }
                                                        curl_close($ch);

                                                        $xml = new SimpleXMLElement($response);

                                                        $offers = $xml->xpath('//offer');
                                                        if (empty($offers)) {
                                                            echo '<tr><td colspan="5">No data found</td><tr>';
                                                          } 
                                                        else 
                                                        {
                                                            foreach($xml->xpath('//offer') as $offer) {
                                                                echo "\n call type" . $offer->{'call-type-group'} ;
                                                                echo "\n total" . $total=$offer->{'initial-quantity'} ;
                                                                echo "\n remaining" .$rem= $offer->{'remaining-quantity'};
								$rem= ($rem/4);  // for test only 
                                                                echo "\n start time" . $start=$offer->{'start-time'} ;
                                                                echo "\n stop time" . $end=$offer->{'end-time'} ;
								$per_75= round($total*75)/100;
								$per_90=round($total*90)/100;
								$per_100=$total;
								$per_30=round($total*30)/100;
								 echo "\n remaining:" .$rem;
								echo "\n 30% -".$per_30;
								echo "\n 75% -".$per_75;
								echo "\n 90% -".$per_90;
								echo "\n 100% -".$per_100."\n";
								if($rem <= "$per_30" || $rem <= "$per_90" || $rem <= "$per_100" )
								{
									echo "send mail \n";
									$message="Dear Vidhya, your balance is $rem";
									$to = "vids.cs@gmil.com";
                    							$fromEmail = 'esim@mysimaccess.com';
                    							$fromName = "gsm2go eSIM";
                    							$subject = "gsm2go eSim low balance alert: ";
                    							$cc = '';
                    							$bcc = '';
                    							$attachments = '';
                    							//$mailer=new Email();

									echo " details : $to- $fromEmail -$subject - $message"; 
                    							//$mailSent = $mailer->Mailer($to,$subject,$message,$cc,$attachments,$fromEmail,$fromName,$bcc);						

								}
                                                            }
                                                        }
                                                        

                                                      //  echo '</table></div>';
                                                        //echo '<pre>' .$response. '</pre>';
                                                    
                                                ?>
