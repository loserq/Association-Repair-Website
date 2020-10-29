<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>待审核</title>
  <link rel="stylesheet" type="text/css" href="../css/common.css">
</head>
<body>
<?php
   include_once '../link.php';
   session_start();
   $pend='待审核';
   if (isset($_SESSION['name'])){
        $res=mysqli_query($link,"select * from message where status='$pend'");
   }else{
       echo "<script>alert('您还没有登录，没有权限访问！');location='../login.php'</script>";
   }
?>
<form action="deal.php" method="post" accept-charset="utf-8">
	<table border="1">
		<caption>待审核的单子</caption>
		<thead>
			<tr>
				<th>姓名</th>
				<th>宿舍号</th>
				<th>微信号</th>
				<th>手机号</th>
				<th>报修时间</th>
				<th>问题描述</th>
				<th>状态</th>
			</tr>
		</thead>
		<tbody>
			 <?php
                   while ($result=mysqli_fetch_assoc($res)){
                ?>
                    <tr>
                        <td class="center"><?php echo $result['name'];?></td>
                        <td class="center"><?php echo $result['ss'];?></td>
                        <td class="center"><?php echo $result['wx'];?></td>
                        <td class="center"><?php echo $result['phone'];?></td>
                        <td class="center"><?php echo $result['time'];?></td>
                        <td class="center"><?php echo $result['pro'];?></td>
                        <td class="center"><?php echo $result['status'];?>
                        <select name="sta" onchange="window.location=this.value">
                          <option>请选择</option>
                          <option value="./deal.php?num=<?php echo $result['num']; ?>">通过</option>
                          <option value="./del.php?num=<?php echo $result['num']; ?>"><span onclick="del();">删除</span></option>
                        </select>
                        </td>
                        
                    </tr>
                <?php
                   }
                ?>
		</tbody>
	</table>
  <!-- <div class="action">
      <button id="checkAll">全选</button>
      <button id="checkReverse">反选</button>
      <input type="submit" value="接单" />
  </div> -->
</form>
<script type="text/javascript">
  function del(){
    if(confirm('确定删除？')){
      return true;
    }
    return false;
  }
</script>

<!-- <script>
    //全选
    document.getElementById("checkAll").onclick = function(){
        var ids = document.getElementsByName("name[]");
        for(var i in ids){
            ids[i].checked = true;
        }
        return false;
    };
    //反选
    document.getElementById("checkReverse").onclick = function(){
        var ids = document.getElementsByName("name[]");
        for(var i in ids){
            ids[i].checked = !ids[i].checked;
        }
        return false;
    };
</script> -->

</body>
</html>