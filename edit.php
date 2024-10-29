<table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>reference</th>
                        <th>Total amount</th>
                        <th>status</th>
                        <th>Date</th>
                    </thead>
                    <tbody>

                   
             <?php
             if(!empty($orders)){
             $count =1;
             foreach($orders as $order){
                ?>
                <tr>
                    <td><?php echo  $count++?></td>
                    <td><?php echo  $order['reference']?></td>
                    <td><?php echo  $order['debited_amount']?></td>
                    <td><?php echo  $order['order_status']?></td>
                    <td><?php echo $order['order_date']?></td>
                </tr>
                <?php
             ?>
            <?php
            }
        }else{
            echo "<h4>No orders found</h4>";
        }
            ?>
            </tbody>
             </table>