<?php
    $dobj->flush_table();
    $dobj->table = "users";
    $dobj->cond = array();
    $res = $dobj->select();
?>
<aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        User Management
                        
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Designation</th>
                                                <th>Company</th>
                                                <th>Phone No.</th>
                                                <th>Email</th>
                                                <th>Voucher</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while( $row = $dobj->fetch_assoc( $res ) ){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['Fname']." ".$row['Lname']; ?></td>
                                            <td><?php echo $row['City']; ?></td>
                                            <td><?php echo $row['Title']; ?></td>
                                            <td><?php echo $row['Company']; ?></td>
                                            <td><?php echo $row['Phone']; ?></td>
                                            <td><?php echo $row['Email']; ?></td>
                                            <td></td>
                                            
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