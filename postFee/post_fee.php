<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>快递装箱规则模拟</title>
	<meta name="keywords" content="关键字列表" />
	<meta name="description" content="网页描述" />
	<link rel="stylesheet" type="text/css" href="" />
	<style type="text/css"></style>
	<script type="text/javascript"></script>
</head>
<body>
<?php



$baoJianPinData = "0";
$xieData = "0";
$shangYiData = "0";
$xiaZhuangData = "0";
$xiHuYongPinData = "0";
$huFuPinTaoJianData = "0";
$beiZiData = "0";
$yingErNaiFenData = "0";
$chengRenNaiFenData = "0";



$hunZhuangData = "0";
$muGuaGaoData = "0";
$dianDongYaShuaData = "0";
$UGGData = "0";
$result = "";
if( $_POST )	//如果有post数据
{
	$baoJianPinData = $_POST['baoJianPin'];//相应接收每个表单项的数据值
    $xieData = $_POST['xie'];//特别注意：表单项的值字符串类型
    $shangYiData = $_POST['shangYi'];
    $xiaZhuangData = $_POST['xiaZhuang'];
    $xiHuYongPinData = $_POST['xiHuYongPin'];
    $huFuPinTaoJianData = $_POST['huFuPinTaoJian'];
    $beiZiData = $_POST['beiZi'];
    $yingErNaiFenData = $_POST['yingErNaiFen'];
    $chengRenNaiFenData = $_POST['chengRenNaiFen'];
	
	//获取checkbox中的变量
	if(isset($_POST['hunZhuang']))
	{
		$hunZhuangData = $_POST['hunZhuang'];	
	}

	if(isset($_POST['muGuaGao']))
	{
		$muGuaGaoData = $_POST['muGuaGao'];
	}
	
	if(isset($_POST['dianDongYaShua']))
	{
		$dianDongYaShuaData = $_POST['dianDongYaShua'];
	}	
	
	if(isset($_POST['UGG']))
	{
		$UGGData = $_POST['UGG'];
	}	

	//验证输入数据是否正确
	if( ctype_digit($baoJianPinData) && 
        ctype_digit($xieData) &&
        ctype_digit($shangYiData) &&
        ctype_digit($xiaZhuangData) &&
        ctype_digit($xiHuYongPinData) &&
        ctype_digit($huFuPinTaoJianData) &&
        ctype_digit($beiZiData) &&
        ctype_digit($yingErNaiFenData) &&
        ctype_digit($chengRenNaiFenData)
	)	//输入的数字都是整数
	{	//开始计算
      echo "$baoJianPinData,,$xieData,,$shangYiData,,$xiaZhuangData,,$xiHuYongPinData,,$huFuPinTaoJianData,,
$beiZiData,,$yingErNaiFenData,,$chengRenNaiFenData";
	  echo "<br/>装箱规则：<br/>";      
      $box = 0;//箱数
	  
      if($hunZhuangData>0)//有混装
	  {
		echo "<hr />保健品和洗护用品有混装，每箱总件不能超过7件，洗护用品不能超过5件<br/>";
		echo "混装电动牙刷视为混装普通保健品和洗护用品<br/>";		
		echo "每箱单价6刀/kg<br/>";
		$n1 = $baoJianPinData;
		$n2 = $xiHuYongPinData;
		//当有足够保健品和洗护用品时，按5洗护2保健品装箱
		while($n2>5 && $n1>=2)
		{		
			$box++;
			$n1=$n1-2;
			$n2=$n2-5;
			echo "<br/>第";
			echo $box.'箱<br/>保健品';
			echo '2个，洗护用品';
			echo '5个<br/>';
		}
		//当保健品不足，但洗护用品超过5瓶时,装纯洗护用品
		while($n2>=6 && $n1<2)
		{
			$box++;
			$n2=$n2-6;
			echo "<br/>第";
			echo $box.'箱<br/>保健品';
			echo '0个，洗护用品';
			echo '6个<br/>';			
		}
		//当洗护用品有且不足6瓶，仍有保健品时,混装
		if($n2<=5 && $n2 > 0 && $n1+$n2>7)
		{
			$box++;
			$n3=7-$n2;
			echo "<br/>第";
			echo $box.'箱<br/>保健品';
			echo $n3.'个，洗护用品';
			echo $n2.'个<br/>';
			$n2 = 0;
			$n1 = $n1 - $n3;
		}
		if($n2<=5 && $n2>0 && $n1+$n2<=7)
		{
			$box++;
			echo "<br/>第";
			echo $box.'箱<br/>保健品';
			echo $n1.'个，洗护用品';
			echo $n2.'个<br/>';
			$n2 = 0;
			$n1 = 0;			
		}
		//当没有洗护用品，只有保健品时，单独装12个以下的保健品
		while($n1>0)
		{		
			$box++;
			if($n1>12)
			{
				echo "<br/>第";
			    echo $box.'箱<br/>保健品';
			    echo '12个，洗护用品';
			    echo $n2.'个<br/>';
				$n1=$n1-12;
			}
			else
			{
				echo "<br/>第";
			    echo $box.'箱<br/>保健品';
			    echo $n1.'个，洗护用品';
			    echo $n2.'个<br/>';
				$n1 = 0;
		    }	
		}

	  }
	  else//无混装
	  {
		$n1 = $baoJianPinData;
		//保健品/食品：
		if($n1>0)
		{
			echo "<hr />保健品每箱限12个以下，单价6刀/kg<br/>";
		}
		while($n1>0)
		{		
			$box++;
			if($n1>12)
			{
				echo "<br/>第";
			    echo $box.'箱<br/>保健品';
			    echo '12个';
				$n1=$n1-12;
			}
			else
			{
				echo "<br/>第";
			    echo $box.'箱<br/>保健品';
			    echo $n1.'个';
				$n1 = 0;
		    }
	    }
		
		$n3=$xieData;
		//鞋每箱一双
		if($n3>0)
		{
			if($UGGData>0)
			{
				echo "<hr />1kg以下UGG鞋每箱一双，包税，8刀/双<br/>";
			}
			else
			{
				echo "<hr />普通鞋每箱一双，包税，单价6刀/kg<br/>";
			}
			

		    for($i=0; $i<$n3;$i++)
		    {
				$box++;
			    echo "<br/>第";
			    echo $box.'箱<br/>一双鞋';
				
			}
			$n3=0;
		}
		
		$n4 = $shangYiData;
		//上衣每箱最多2件
		if($n4>0)
		{
			echo "<hr />普通上衣每箱两件，包税，单价6刀/kg<br/>";
		    while($n4>=2)
		    {
				$box++;
				$n4=$n4-2;
			    echo "<br/>第";
			    echo $box.'箱<br/>2件上衣';
				
			}
			if($n4==1)
			{
				$box++;
				echo "<br/>第";
			    echo $box.'箱<br/>1件上衣';
				$n4=0;
			}
			$n4=0;
		}		
		
		$n5 = $xiaZhuangData;
		//下装每箱1件
		if($n5>0)
		{
			echo "<hr />普通下装每箱一件，包税，单价6刀/kg<br/>";
			
		    for($i=0; $i<$n5;$i++)
		    {
				$box++;
			    echo "<br/>第";
			    echo $box.'箱<br/>下装一件';	
			}
			$n5=0;
		}
		
		$n2 = $xiHuYongPinData;
		//洗护用品
		if($n2>0)
		{
			echo "<hr />洗护用品每箱限6个以下，单价6刀/kg<br/>";
		}
		//小件物品可多放
		if($muGuaGaoData>0 && $dianDongYaShuaData==0)
		{
			echo "特殊情况：羊奶皂/木瓜膏每箱可放8个<br/>";
			while($n2>0)
		    {		
			  $box++;
			  if($n2>8)
			  {
				echo "<br/>第";
			    echo $box.'箱<br/>洗护用品';
			    echo '8个';
				$n2=$n2-8;
			  }
			  else
			  {
				echo "<br/>第";
			    echo $box.'箱<br/>洗护用品';
			    echo $n2.'个';
				$n2 = 0;
		      }
	        }	
		}
		//电动牙刷可放5个
		else if($muGuaGaoData==0 && $dianDongYaShuaData>0)
		{
			echo "特殊情况：电动牙刷每箱可放5个<br/>";
			while($n2>0)
		    {		
			  $box++;
			  if($n2>5)
			  {
				echo "<br/>第";
			    echo $box.'箱<br/>洗护用品';
			    echo '5个';
				$n2=$n2-5;
			  }
			  else
			  {
				echo "<br/>第";
			    echo $box.'箱<br/>洗护用品';
			    echo $n2.'个';
				$n2 = 0;
		      }
	        }	
		}			
		else if($muGuaGaoData>0 && $dianDongYaShuaData>0)
		{
			echo "发生错误，请勿多选";
		}
		
		while($n2>0)
		{		
			$box++;
			if($n2>6)
			{
				echo "<br/>第";
			    echo $box.'箱<br/>洗护用品';
			    echo '6个';
				$n2=$n2-6;
			}
			else
			{
				echo "<br/>第";
			    echo $box.'箱<br/>洗护用品';
			    echo $n2.'个';
				$n2 = 0;
		    }
	    }
		
		$n6 = $huFuPinTaoJianData;
		//护肤品套件一套一箱
		if($n6>0)
		{
			echo "<hr />护肤品套件一套一箱，单价6刀/kg<br/>";
			
		    for($i=0; $i<$n6;$i++)
		    {
				$box++;
			    echo "<br/>第";
			    echo $box.'箱<br/>护肤品套件一套';	
			}
			$n6=0;
		}

		$n7 = $beiZiData;
		//被子一件一箱
		if($n7>0)
		{
			echo "<hr />被子一件一箱，需自带真空袋，单价6刀/kg<br/>";
			
		    for($i=0; $i<$n7;$i++)
		    {
				$box++;
			    echo "<br/>第";
			    echo $box.'箱<br/>被子一件';		
			}
			$n7=0;
		}
		
		//婴儿奶粉
		$n8 = $yingErNaiFenData;
		if($n8>0)
		{
			echo "<hr />婴儿奶粉运费价格如下<br/>";
			//6罐以上
			while($n8>=6)
			{
				$box++;
				$n8=$n8-6;
			    echo "<br/>第";
			    echo "$box";
			    echo '箱<br/>婴儿奶粉6罐,邮寄运费37刀';	
			}
			//5罐
			if($n8==5)
			{
			    $box++;
		        echo "<br/>第";
		        echo $box.'箱<br/>婴儿奶粉3罐，邮寄运费19刀';
				
			    $box++;
		        echo "<br/>第";
		        echo "$box";
				echo '箱<br/>婴儿奶粉2罐，邮寄运费13刀';				
				$n8=0;
			}
			//4罐
			if($n8==4)
			{
			    $box++;
		        echo "<br/>第";
		        echo $box.'箱<br/>婴儿奶粉2罐，邮寄运费13刀';
				
			    $box++;
		        echo "<br/>第";
		        echo "$box";
				echo '箱<br/>婴儿奶粉2罐，邮寄运费13刀';				
				$n8=0;
			}	
				
			
			//3罐
			if($n8==3)
			{
			    $box++;
		        echo "<br/>第";
			    echo "$box";
		        echo '箱<br/>婴儿奶粉3罐，邮寄运费19刀';
				$n8=0;
			}
			//2罐
			if($n8==2)
			{				
			    $box++;
		        echo "<br/>第";
		        echo "$box";
				echo '箱<br/>婴儿奶粉2罐，邮寄运费13刀';				
				$n8=0;
			}
			//1罐
			if($n8==1)
			{
			    $box++;
		        echo "<br/>第";
		        echo "$box";
				echo '箱<br/>婴儿奶粉1罐，邮寄运费8刀';				
				$n8=0;
			}
		}
		
		//成人奶粉
		$n9 = $chengRenNaiFenData;
		if($n9>0)
		{
			echo "<hr />成人奶粉运费价格如下<br/>";
			//6罐以上
			while($n9>=6)
			{
				$box++;
				$n9=$n9-6;
			    echo "<br/>第";
			    echo "$box";
			    echo '箱<br/>成人奶粉6罐,邮寄运费36.5刀';	
			}
			//5罐
			if($n9==5)
			{
			    $box++;
		        echo "<br/>第";
		        echo $box.'箱<br/>成人奶粉3罐，邮寄运费18.5刀';
				
			    $box++;
		        echo "<br/>第";
		        echo "$box";
				echo '箱<br/>成人奶粉2罐，邮寄运费13刀';				
				$n9=0;
			}
			//4罐
			if($n9==4)
			{
			
			    $box++;
		        echo "<br/>第";
		        echo "$box";
				echo '箱<br/>成人奶粉2罐，邮寄运费25刀';				
				$n9=0;
			}	
				
			
			//3罐
			if($n9==3)
			{
			    $box++;
		        echo "<br/>第";
			    echo "$box";
		        echo '箱<br/>成人奶粉3罐，邮寄运费18.5刀';
				$n9=0;
			}
			//2罐
			if($n9==2)
			{				
			    $box++;
		        echo "<br/>第";
		        echo "$box";
				echo '箱<br/>成人奶粉2罐，邮寄运费13刀';				
				$n8=0;
			}
			//1罐
			if($n9==1)
			{
			    $box++;
		        echo "<br/>第";
		        echo "$box";
				echo '箱<br/>成人奶粉1罐，邮寄运费8刀';				
				$n9=0;
			}
		}
	  }
      echo "<hr />";
	}
	else{	//否则：
		echo "请输入整数进行计算";
		echo "<hr />";
	}
}
?>

	<form  action=""  method="post" >
	    <?php 
		  echo "1.保健品/食品：<br/>";
		  echo "件数：";			
		?>
		<input type="text"   name="baoJianPin"   value="<?php echo $baoJianPinData;?>"  />
	    <?php
		  echo "<br/><br/>2.鞋类/衣服：<br/>";	
		  echo "鞋类：";
        ?>
		<input type="text"   name="xie"   value="<?php echo $xieData;?>"  />
	    <?php
		  echo "双&nbsp;是否是重量在1KG以下的UGG？";//&nbsp;是空格
		if($UGGData>0){
		 ?> 
		<input type="checkbox" name="UGG" value="1" checked>是
		<?php
        }else{?>	
		<input type="checkbox" name="UGG" value="1" />是
		
		<?php
		}
		  echo "<br/>上衣：";
		 ?>
		<input type="text"   name="shangYi"   value="<?php echo $shangYiData;?>"  />
	    <?php
		  echo "件<br/>";
		  echo "下装：";
		 ?>
		<input type="text"   name="xiaZhuang"   value="<?php echo $xiaZhuangData;?>"  />
	    <?php
		  echo "件";
		  echo "<br/><br/>3.洗护用品：<br/>";
		  echo "件数：";
		 ?> 
		<input type="text"   name="xiHuYongPin"   value="<?php echo $xiHuYongPinData;?>"  />		  

	    <?php
		  echo "&nbsp;是否与保健品/食品混装？";
		 ?> 		
        <?php 
		if($hunZhuangData>0){?>		 
		    <input type="checkbox" name="hunZhuang" checked="checked" value="1" />是
		<?php //0为不混装，1为混装
        }else{?>	
		    <input type="checkbox" name="hunZhuang" value="1" />是			
	    <?php
		}

		//羊奶皂、木瓜膏可放8个
		echo "&nbsp;是否全为羊奶皂/木瓜膏？";
		if($muGuaGaoData>0){
		 ?> 
		<input type="checkbox" name="muGuaGao" value="1" checked>是
		<?php
        }else{?>	
		<input type="checkbox" name="muGuaGao" value="1" />是
		
		<?php
		}
		
		//电动牙刷可放5个
		
		echo "&nbsp;是否全为电动牙刷？";
		if($dianDongYaShuaData>0){
		 ?> 
		<input type="checkbox" name="dianDongYaShua" value="1" checked>是
		<?php
        }else{?>	
		<input type="checkbox" name="dianDongYaShua" value="1" />是
		
		<?php
		}
				
		
		  echo "<br/><br/>4.护肤品套件：<br/>";
		  echo "件数：";
		 ?> 
		<input type="text"   name="huFuPinTaoJian"   value="<?php echo $huFuPinTaoJianData;?>"  />	

		<?php
		  echo "<br/><br/>5.被子：<br/>";
		  echo "件数：";
		 ?> 
		<input type="text"   name="beiZi"   value="<?php echo $beiZiData;?>"  />	
		<?php
		  echo "<br/><br/>6.奶粉：<br/>";
		  echo "婴儿奶粉：";
		 ?> 
		<input type="text"   name="yingErNaiFen"   value="<?php echo $yingErNaiFenData;?>"  />	
		<?php
		  echo "罐<br/>";
		  echo "成人奶粉：";
		 ?> 		
		<input type="text"   name="chengRenNaiFen"   value="<?php echo $chengRenNaiFenData;?>"  />			
		
		<?php
		  echo "罐<br/>";
		  echo "<br/><br/>";
		 ?> 		

		<input type="submit"  value="提交"  />
	</form>

</body>
</html>
