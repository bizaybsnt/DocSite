<?php
    $dobj->flush_table();
    $dobj->table = "abstract_manager";
    $dobj->cond = array();
    $res = $dobj->select();
?>
<aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Abstract Manager
                        
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                                    <table class="table table-bordered table-hover" border="1">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Abstract Title</th>
                                                <th width="150px">Abstract Title</th>
                                                <th>Country</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Designation</th>
                                                <th>Company</th>
                                                <th>Phone No.</th>
                                                <th>Email</th>
                                                <th colspan="2">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while( $row = $dobj->fetch_assoc( $res ) ){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['fname']."<br/>".$row['Lname']; ?></td>
                                            <td><?php echo $row['AbstractTitle']; ?></td>
                                            <td><?php echo $row['abstract']; ?></td>
                                            <td><?php echo $row['Country']; ?></td>
                                            <td><?php echo $row['City']; ?></td>
                                            <td><?php echo $row['State']; ?></td>
                                            <td><?php echo $row['Designation']; ?></td>
                                            <td><?php echo $row['Company']; ?></td>
                                            <td><?php echo $row['Phone']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td>
                                                
                                                <form method="POST" action="index.php?_page=temp&action=accept&id=<?php echo $row['id']; ?>">
                                                <div style="margin-top: 2px;">
                                                  <input type="submit" name="accept" value="Accept">
                                                  </div>

                                                  </form>

                                                  <form method="POST" action="index.php?_page=temp&action=reject&id=<?php echo $row['id']; ?>">
                                                  <div style="margin-top: 5px;">
                                                  <input type="submit" name="reject" value="Reject">
                                                  </div>
                                                  </form>
                                                   <?php 
                                                         // if(isset($_POST[$s]))
                                                         // {
                                                         //    $dobj->data = array("remarks" => '1');
                                                         //    $dobj->cond = array("id"=>$row['id']);
                                                         //    $dobj->update();

                                                         //    // $url="index.php?_page=abstract";
                                                         //    // $dobj->redirect_to($url);
                                                         // }

                                                    ?>
                                                  
                                                  <?php 
                                                        //  if(isset($_POST[$r]))
                                                        //  {
                                                        //     $dobj->data = array("remarks" => '0');
                                                        //     $dobj->cond = array("id"=>$row['id']);
                                                        //     $dobj->update();
                                                        //     // $url="index.php?_page=abstract";
                                                        //     // $dobj->redirect_to($url);                                        
                                                        // }

                                                    ?>
                                                </form>
                                                 
                                            </td>
                                            <td>
                                            <?php 
                                                 if($row['remarks']==0)
                                                 {
                                                    echo 'New Entry';
                                                 }
                                                 else if ($row['remarks']==1)
                                                 {
                                                    echo 'Accepted';
                                                 }
                                                 else if ($row['remarks']==2)
                                                 {
                                                    echo 'Rejected';
                                                 }
                                                 

                                                 ?>
                                            </td>
                                            
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                                        <tfoot>
                                            
                                        </tfoot>
                                    </table>
    

                </section><!-- /.content -->
            </aside><!-- /.right-side -->