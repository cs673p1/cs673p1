<div class="span9">
    <?php $houses=$model->house; ?>
    <div><h5><?php $tempcount = 0;
            foreach($houses as $house) :
                $tempcount++;
            endforeach;
            if($tempcount == 0)
                echo"You Have No Houses Yet! ";
            ?></h5></div>
    <?php $count=0;?>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip Code</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($houses as $house): ?>
            <tr>
                <td><?php echo CHtml::link($house->title, array('house/view', 'id'=>$house->id)) ;?></td>
                <td><?php echo "{$house->address_1}  {$house->address_2}" ;?></td>
                <td><?php echo $house->city ; ?></td>
                <td><?php echo $house->state ; ?></td>
                <td><?php echo $house->zip_code ; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


