<div id="reloaddata">
<div class="text-center text-purple">
<h4>
<?php
    if($mess != "") echo $mess;
?>
</h4>
</div>
  <table class="table table-hover">
    <tr class="bg-blue">
      <th>STT</th>
      <th>Mô tả</th>
      <th>Images</th>
      <th width="150px">Từ khóa thẻ ALT</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <?php
    $stt = 0;
    foreach ($slider as $value) {
      $stt++;
      echo "<tr>";
      echo "<td>$stt</td>";
      echo "<td>{$value['info']}</td>";
      echo "<td><img src='".base_url()."uploads/images/".$value['image']."' class='imgs'width='100' /></td>"; 
      echo "<td>{$value['keyword']}</td>";
      echo "<td><a title='Edit' class='btn btn-xs- btn-info btn-flat' href='".base_url()."$module/slider/edit/{$value['id']}'>Sửa</a></td>";
      echo "<td><a title='Del' class='btn btn-xs- btn-danger btn-flat' href='".base_url()."$module/slider/del/{$value['id']}' onclick='return confirm_delete(\"Bạn chắc chắn muốn xóa?\")'>Xóa</a></td>";
      echo "</tr>";
    }
    ?>
  </table>
</div> 