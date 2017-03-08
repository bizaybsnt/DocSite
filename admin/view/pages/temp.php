<?php
 
															$dobj->flush_table();
															$dobj->table = "abstract_manager";
															//$action= $_POST['action'];
															//var_dump($action);
															if(isset($_POST["accept"]))
															{
															echo $_POST["accept"];
                                                            $dobj->data = array("remarks" => '1');
                                                            $dobj->cond = array("id"=>$_GET['id']);
                                                            $dobj->update();
                                                        	}
															if(isset($_POST["reject"]))
															{
															echo $_POST["reject"];
                                                            $dobj->data = array("remarks" => '2');
                                                            $dobj->cond = array("id"=>$_GET['id']);
                                                            $dobj->update();
                                                        	}

                                                            // $url="index.php?_page=abstract";
                                                        //     // $dobj->redirect_to($url);
                                                        //  }
                                                        //   if(isset($_POST[$r]))
                                                        //  {
                                                        //     $dobj->data = array("remarks" => '0');
                                                        //     $dobj->cond = array("id"=>$row['id']);
                                                        //     $dobj->update();
                                                        // }

                                                    
  $url="index.php?_page=abstract";
 $dobj->redirect_to($url);

?>