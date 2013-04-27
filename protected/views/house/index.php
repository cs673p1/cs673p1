<div id="myhouse" background: url(images/transparent.JPG) no-repeat;>
<div class="span8 offset1">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Title</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($houses as $house): ?>
            <tr>
                <td><?php echo CHtml::link($house->title, array('house/view', 'id'=>$house->id)) ;?></td>
                <td><?php echo "{$house->address_1}  {$house->address_2}" ;?></td>
                <td><?php echo $house->city ; ?></td>
                <td><?php echo $house->state ; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div></div>
