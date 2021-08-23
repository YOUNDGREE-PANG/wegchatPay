<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Cookie;
use think\View;
use app\index\model\Userinfo;
use app\index\model\User;
use app\index\model\Gzhuser;
use app\index\model\Personposter;
use app\index\model\Poster;
use app\index\model\Classlist;
use app\index\model\Classinfo;
use app\index\model\Banner;
use app\index\model\Stcontact;
use app\index\model\Contact;
use app\index\model\Favclass;
use app\index\model\Comment;
use app\index\model\Commentreal;
use app\index\model\Zuhe;

class Index extends Controller
{
	
	
//秒杀报读列表	
public function miaoshainfo(){
		
		
		$res=db('miaoshausers')->select();
		
		 $this->assign('res',$res);
    	
    return $this->fetch();

		
	}
	
//北城音乐播放器页面
public function audio($id){
		
		
		$res=db('bcaudio')->where('id','=',$id)->select();
		$title=db('bcaudio')->where('id','=',$id)->column('title');
		$this->assign('res',$res);
    	$this->assign('title',$title);
		return $this->fetch();

		
	}
	
	
		public function achselect(){
		
	
	
    
		return $this->fetch();

		
	}
	
	public function achievement(Request$request){
		
		$name=$request->post('name');
		$res=db('achievement')->where('name','=',$name)->select();
		$this->assign('res',$res);
		return $this->fetch();

		
	}
	
	
	//学生排名列表展示
public function classlist(){



$grade=$_GET['grade'];


switch ($grade) {
	case 1:
			 $this->assign('nianji','一年级');
		break;
	
	case 2:
			 $this->assign('nianji','二年级');
		break;
		
	case 3:
			 $this->assign('nianji','三年级');
		break;
			
	case 4:
			 $this->assign('nianji','四年级');
		break;
		
	case 5:
			 $this->assign('nianji','五年级');
		break;
				
	case 6:
			 $this->assign('nianji','六年级');
		break;
		
						
	case 6:
			 $this->assign('nianji','六年级');
		break;
		
	case 7:
			 $this->assign('nianji','初一');
		break;
		
	case 8:
			 $this->assign('nianji','初二');
		break;
		
	case 9:
			 $this->assign('nianji','初三');
		break;
		
	case 10:
			 $this->assign('nianji','高一');
		break;
		
	case 11:
			 $this->assign('nianji','高二');
		break;
		
	case 12:
			 $this->assign('nianji','高三');
		break;
		
	// default:
	
	// 	break;
}

//   $infoid=$_GET['infoid'];

 //不要循环查询语句  会卡死！！！
// for($num=1;$num++;$num<10){
// 	$title='res'.$num;
	
// 	$title=db('classtable')->where('clid','=',$num)->select();
// 	$this->assign($title,$title);
// }

$has9 = db('classtable')->where('clid','=',9)->where('grade','=',$grade)->find();
$has10 = db('classtable')->where('clid','=',10)->where('grade','=',$grade)->find();
$has19 = db('classtable')->where('clid','=',19)->where('grade','=',$grade)->find();
$has20 = db('classtable')->where('clid','=',20)->where('grade','=',$grade)->find();
$has29 = db('classtable')->where('clid','=',29)->where('grade','=',$grade)->find();
$has30 = db('classtable')->where('clid','=',30)->where('grade','=',$grade)->find();
$has39 = db('classtable')->where('clid','=',39)->where('grade','=',$grade)->find();
$has40 = db('classtable')->where('clid','=',40)->where('grade','=',$grade)->find();
$has49 = db('classtable')->where('clid','=',49)->where('grade','=',$grade)->find();
$has50 = db('classtable')->where('clid','=',50)->where('grade','=',$grade)->find();
$has59 = db('classtable')->where('clid','=',59)->where('grade','=',$grade)->find();
$has60 = db('classtable')->where('clid','=',60)->where('grade','=',$grade)->find();
$showtrue='';
$showfalse='display:none';

	if(empty($has9)&&empty($has10)){
    		
    			 $this->assign('show1',$showfalse);
    	}else{
    		
    		
    	 $this->assign('show1',$showtrue);
    		
    	}
    	
    	if(empty($has19)&&empty($has20)){
    		
    			 $this->assign('show2',$showfalse);
    	}else{
    		
    		
    	 $this->assign('show2',$showtrue);
    		
    	}	

			if(empty($has29)&&empty($has30)){
    		
    			 $this->assign('show3',$showfalse);
    	}else{
    		
    		
    	 $this->assign('show3',$showtrue);
    		
    	}
		if(empty($has39)&&empty($has40)){
    		
    			 $this->assign('show4',$showfalse);
    	}else{
    		
    		
    	 $this->assign('show4',$showtrue);
    		
    	}
			if(empty($has49)&&empty($has50)){
    		
    			 $this->assign('show5',$showfalse);
    	}else{
    		
    		
    	 $this->assign('show5',$showtrue);
    		
    	}
    		if(empty($has59)&&empty($has60)){
    		
    			 $this->assign('show6',$showfalse);
    	}else{
    		
    		
    	 $this->assign('show6',$showtrue);
    		
    	}

$res1=db('classtable')->where('clid','=',1)->where('grade','=',$grade)->select();
	$res2=db('classtable')->where('clid','=',2)->where('grade','=',$grade)->select();
		$res3=db('classtable')->where('clid','=',3)->where('grade','=',$grade)->select();
			$res4=db('classtable')->where('clid','=',4)->where('grade','=',$grade)->select();
				$res5=db('classtable')->where('clid','=',5)->where('grade','=',$grade)->select();
					$res6=db('classtable')->where('clid','=',6)->where('grade','=',$grade)->select();
						$res7=db('classtable')->where('clid','=',7)->where('grade','=',$grade)->select();
						$res8=db('classtable')->where('clid','=',8)->where('grade','=',$grade)->select();
						$res9=db('classtable')->where('clid','=',9)->where('grade','=',$grade)->select();
						$res10=db('classtable')->where('clid','=',10)->where('grade','=',$grade)->select();

$res11=db('classtable')->where('clid','=',11)->where('grade','=',$grade)->select();
	$res12=db('classtable')->where('clid','=',12)->where('grade','=',$grade)->select();
		$res13=db('classtable')->where('clid','=',13)->where('grade','=',$grade)->select();
			$res14=db('classtable')->where('clid','=',14)->where('grade','=',$grade)->select();
				$res15=db('classtable')->where('clid','=',15)->where('grade','=',$grade)->select();
					$res16=db('classtable')->where('clid','=',16)->where('grade','=',$grade)->select();
						$res17=db('classtable')->where('clid','=',17)->where('grade','=',$grade)->select();
						$res18=db('classtable')->where('clid','=',18)->where('grade','=',$grade)->select();
						$res19=db('classtable')->where('clid','=',19)->where('grade','=',$grade)->select();
						$res20=db('classtable')->where('clid','=',20)->where('grade','=',$grade)->select();

$res21=db('classtable')->where('clid','=',21)->where('grade','=',$grade)->select();
	$res22=db('classtable')->where('clid','=',22)->where('grade','=',$grade)->select();
		$res23=db('classtable')->where('clid','=',23)->where('grade','=',$grade)->select();
			$res24=db('classtable')->where('clid','=',24)->where('grade','=',$grade)->select();
				$res25=db('classtable')->where('clid','=',25)->where('grade','=',$grade)->select();
					$res26=db('classtable')->where('clid','=',26)->where('grade','=',$grade)->select();
						$res27=db('classtable')->where('clid','=',27)->where('grade','=',$grade)->select();
						$res28=db('classtable')->where('clid','=',28)->where('grade','=',$grade)->select();
						$res29=db('classtable')->where('clid','=',29)->where('grade','=',$grade)->select();
						$res30=db('classtable')->where('clid','=',30)->where('grade','=',$grade)->select();
									
$res31=db('classtable')->where('clid','=',31)->where('grade','=',$grade)->select();
	$res32=db('classtable')->where('clid','=',32)->where('grade','=',$grade)->select();
		$res33=db('classtable')->where('clid','=',33)->where('grade','=',$grade)->select();
			$res34=db('classtable')->where('clid','=',34)->where('grade','=',$grade)->select();
				$res35=db('classtable')->where('clid','=',35)->where('grade','=',$grade)->select();
					$res36=db('classtable')->where('clid','=',36)->where('grade','=',$grade)->select();
						$res37=db('classtable')->where('clid','=',37)->where('grade','=',$grade)->select();
						$res38=db('classtable')->where('clid','=',38)->where('grade','=',$grade)->select();
						$res39=db('classtable')->where('clid','=',39)->where('grade','=',$grade)->select();
						$res40=db('classtable')->where('clid','=',40)->where('grade','=',$grade)->select();
																		
$res41=db('classtable')->where('clid','=',41)->where('grade','=',$grade)->select();
	$res42=db('classtable')->where('clid','=',42)->where('grade','=',$grade)->select();
		$res43=db('classtable')->where('clid','=',43)->where('grade','=',$grade)->select();
			$res44=db('classtable')->where('clid','=',44)->where('grade','=',$grade)->select();
				$res45=db('classtable')->where('clid','=',45)->where('grade','=',$grade)->select();
					$res46=db('classtable')->where('clid','=',46)->where('grade','=',$grade)->select();
						$res47=db('classtable')->where('clid','=',47)->where('grade','=',$grade)->select();
						$res48=db('classtable')->where('clid','=',48)->where('grade','=',$grade)->select();
						$res49=db('classtable')->where('clid','=',49)->where('grade','=',$grade)->select();
						$res50=db('classtable')->where('clid','=',50)->where('grade','=',$grade)->select();
									
$res51=db('classtable')->where('clid','=',51)->where('grade','=',$grade)->select();
	$res52=db('classtable')->where('clid','=',52)->where('grade','=',$grade)->select();
		$res53=db('classtable')->where('clid','=',53)->where('grade','=',$grade)->select();
			$res54=db('classtable')->where('clid','=',54)->where('grade','=',$grade)->select();
				$res55=db('classtable')->where('clid','=',55)->where('grade','=',$grade)->select();
					$res56=db('classtable')->where('clid','=',56)->where('grade','=',$grade)->select();
						$res57=db('classtable')->where('clid','=',57)->where('grade','=',$grade)->select();
						$res58=db('classtable')->where('clid','=',58)->where('grade','=',$grade)->select();
						$res59=db('classtable')->where('clid','=',59)->where('grade','=',$grade)->select();
						$res60=db('classtable')->where('clid','=',60)->where('grade','=',$grade)->select();


$this->assign('res1',$res1);
 $this->assign('res2',$res2);
  $this->assign('res3',$res3);
  $this->assign('res4',$res4);
    $this->assign('res5',$res5);
     $this->assign('res6',$res6);
      $this->assign('res7',$res7);
      $this->assign('res8',$res8);
		$this->assign('res9',$res9);
    	 $this->assign('res10',$res10);


$this->assign('res11',$res11);
 $this->assign('res12',$res12);
  $this->assign('res13',$res13);
  $this->assign('res14',$res14);
    $this->assign('res15',$res15);
     $this->assign('res16',$res16);
      $this->assign('res17',$res17);
      $this->assign('res18',$res18);
		$this->assign('res19',$res19);
    	 $this->assign('res20',$res20);
    	 
$this->assign('res21',$res21);
 $this->assign('res22',$res22);
  $this->assign('res23',$res23);
  $this->assign('res24',$res24);
    $this->assign('res25',$res25);
     $this->assign('res26',$res26);
      $this->assign('res27',$res27);
      $this->assign('res28',$res28);
		$this->assign('res29',$res29);
    	 $this->assign('res30',$res30);
    	 
$this->assign('res31',$res31);
 $this->assign('res32',$res32);
  $this->assign('res33',$res33);
  $this->assign('res34',$res34);
    $this->assign('res35',$res35);
     $this->assign('res36',$res36);
      $this->assign('res37',$res37);
      $this->assign('res38',$res38);
		$this->assign('res39',$res39);
    	 $this->assign('res40',$res40);
    	 
$this->assign('res41',$res41);
 $this->assign('res42',$res42);
  $this->assign('res43',$res43);
  $this->assign('res44',$res44);
    $this->assign('res45',$res45);
     $this->assign('res46',$res46);
      $this->assign('res47',$res47);
      $this->assign('res48',$res48);
		$this->assign('res49',$res49);
    	 $this->assign('res50',$res50);
    	 
$this->assign('res51',$res51);
 $this->assign('res52',$res52);
  $this->assign('res53',$res53);
  $this->assign('res54',$res54);
    $this->assign('res55',$res55);
     $this->assign('res56',$res56);
      $this->assign('res57',$res57);
      $this->assign('res58',$res58);
		$this->assign('res59',$res59);
    	 $this->assign('res60',$res60);
    	 
    	 $this->assign('grade',$grade);
    	 
    return $this->fetch();


}
	
	
	//查询优惠券
public function cardfind(Request$request){

$tell=$request->post("tell");

// $tell=$_POST['tell'];
 
 
 $res=db('cardlist')->where('tell','=',$tell)->where('used','=',0)->select();


return json($res);

}	
	
	
		//查询可用优惠券数目
public function cardnum(Request$request){

$tell=$request->post("tell");

// $tell=$_POST['tell'];
 
 
 $res=db('cardlist')->where('tell','=',$tell)->where('used','=',0)->count();
	$data=array('cardnum'=>$res);

return json($data);

}
	
	
//学生排名列表展示
public function ranking(){

  $infoid=$_GET['infoid'];

$res=db('students')->order('score desc')->select();

 $this->assign('res',$res);

    return $this->fetch();

}


	
//用户优惠券
public function cardlist(){

$openid=$_GET['openid'];

$res=db('cardlist')->where('openid','=',$openid)->order('id desc')->select();
$ses=db('user')->where('openid','=',$openid)->order('id desc')->column('integral');

$tes=array('integral'=>$ses[0],'cardlist'=>$res);

return json($tes);

}


//小程序手机号同步到openid
public function tellupdate($openid,$tell){
	
	
		$Model=new User;
		$his = array('tell' =>$tell);
  
        $idd=$Model->save($his,['openid'=>$openid]);
    	$tellhas=db('user')->where('tell','=',$tell)->column('integral');
    	
    	
    	
    	
    	// if($tellhas[0]<20){
    		
    	// 		$his = array('tell' =>$tell,'integral'=>20);	
    	// }else{
    		
    	// 	$his = array('tell' =>$tell);
    	// }
    	
    
	
    	
    } 


public function testin(Request$request){

$Model=new Gzhuser;
	$Ues=$request->get();
  $insert=$Model->create($Ues);
		
	

}


public function zhuanpanheng($name){



   $this->assign('name',$name);
   return $this->fetch();
		
	

}


public function fanpaiheng($name){



 $this->assign('name',$name);
 return $this->fetch();
		
	

}

public function fpyxdejuan(){


return $this->fetch();
		
	

}

public function fpyxxinyu(){


return $this->fetch();
		
	

}


public function fpyxwenjun(){


return $this->fetch();
		
	

}


public function fpzyxwangqi(){


return $this->fetch();
		
	

}


public function fpyxhuyue(){


return $this->fetch();
		
	

}

public function fpyxzhenzhen(){


	return $this->fetch();
		
	

}

public function errorinfo(){


		return '为防止暴力破解请在手机微信内打开';
	}


public function fpyxmeilan(){


	return $this->fetch();
		
	

}


public function fpyxyanning(){


	return $this->fetch();
		
	

}


public function fpyxfushan(){


	return $this->fetch();
		
	

}


public function fpyxzhouyuan(){


	return $this->fetch();
		
	

}


public function fpyxyuxian(){


	return $this->fetch();
		
	

}




public function haibao(){

	$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $randStr = str_shuffle($str); //打乱字符串
    $rands = substr($randStr, 0, 6); //substr(string,start,length);返回字符串的一部分
     $this->assign('rands',$rands);
	return $this->fetch();
		
	

}


public function haibao1($name){

	$res=db('poster')->where('name','=',$name)->select();
     $this->assign('res',$res);
	return $this->fetch();
		
	

}






//海报图片文字信息上传处理接口
public function upload(Request$request)
    {

// 获取表单上传文件 例如上传了001.jpg
    $file = request()->file('src');
    if($file==""){
    	
    	
    echo '<html><head><link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css"></head><body><div class="container" style="margin-top: 15%"><p style="font-size: 65pt;">o(╥﹏╥)o 您还没有上传二维码图片呢~</p><br><a href="haibao"><button type="button" class="btn btn-danger">点击返回</button></a></div></body></html>';
    	
    } 
    // 移动到框架应用根目录/public/uploads/ 目录下
    if($file){
        $info = $file->move(ROOT_PATH . 'public' . DS . 'ewmuploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            // echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            // echo  'uploads/'.$info->getSaveName();
            $res=str_replace("\\",'/',$info->getSaveName());
            // $res=$info->getSaveName();
           $ses='https://www.bcjy.online/ewmuploads/'.$res;

            //文件上传信息写入images数据表
       
        
        
        
         $title=$request->post('title');
		 $subtitle=$request->post('subtitle');
     	 $words1=$request->post('words1');
     	 $words2=$request->post('words2');
     	 $words3=$request->post('words3');
     	 $name=$request->post('name');
         $Model2=new Poster;
		 $Data=array('title'=> $title,'subtitle'=> $subtitle,'words1'=> $words1,'words2'=> $words2,'words3'=> $words3,'src'=>$ses,'name'=>$name);
         $insert=$Model2->create($Data);



   header('Location:haibao1?name='.$name);
		//file_put_contents('bee.txt','execute');
		die;



        
       

            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            // echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
            
            
        }
    }




     

    }




//个人海报编辑页面
public function personposter(){

	$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    $randStr = str_shuffle($str); //打乱字符串
    $rands = substr($randStr, 0, 6); //substr(string,start,length);返回字符串的一部分
     $this->assign('rands',$rands);
	return $this->fetch();
		
	

}

//个人海报合成页面
public function personposter1($postkey){

	$res=db('personposter')->where('postkey','=',$postkey)->select();
     $this->assign('res',$res);
	return $this->fetch();
		


}



//个人海报图片文字信息上传处理接口
public function upload1(Request$request)
    {

// 获取表单上传文件 例如上传了001.jpg
    $file = request()->file('src');
    if($file==""){
    	
    	
    echo '<html><head><link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css"></head><body><div class="container" style="margin-top: 15%"><p style="font-size: 65pt;">o(╥﹏╥)o 您还没有上传二维码图片呢~</p><br><a href="personposter"><button type="button" class="btn btn-danger">点击返回</button></a></div></body></html>';
    	
    } 
    // 移动到框架应用根目录/public/uploads/ 目录下
    if($file){
        $info = $file->move(ROOT_PATH . 'public' . DS . 'ewmuploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            // echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            // echo  'uploads/'.$info->getSaveName();
            $res=str_replace("\\",'/',$info->getSaveName());
            // $res=$info->getSaveName();
           $ses='https://www.bcjy.online/ewmuploads/'.$res;

            //文件上传信息写入images数据表
       
        
         $title=$request->post('title');
		 $words=$request->post('words');
     	 $words1=$request->post('words1');
     	 $words2=$request->post('words2');
     	 $words3=$request->post('words3');
     	 $name1=$request->post('name1');
     	 $name2=$request->post('name2');
     	 $postkey=$request->post('postkey');
         $Model2=new Personposter;
            
	$Data=array('title'=> $title,'words'=> $words,'words1'=> $words1,'words2'=> $words2,'words3'=>$words3,'src'=>$ses,'name1'=>$name1,'name2'=>$name2,'postkey'=> $postkey,);
			
          $insert=$Model2->create($Data);

   header('Location:personposter1?postkey='.$postkey);
		//file_put_contents('bee.txt','execute');
		die;


            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            // echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
            
            
        }
    }




     

    }


	
public function index(){

	$res=Classlist::table('Classlist')->select();

	return $this->fetch();
		
	// return json($res);

}




//老师电话号码接口
public function teachertellnumber($id){

		$res=Classlist::table('Classlist')->where('id','=',$id)->column('cellphone');

		
		return json($res);

}
		
		
//老师电话号码接口
public function layindex($page,$limit){

		$res=Classlist::table('Classlist')->page($page,$limit)->select();

		$ses = array('code' =>0 ,'msg' =>' ','count' =>200,  'data' =>$res, );
		
		return json($ses);

}



	//报读课程接口
public function baodu(Request$request){

	$Model=new Contact;
	
	$Ues=$request->get();
	
	$insert=$Model->create($Ues);

}


	//试听预约接口
public function styy(Request$request){

	$Model=new Stcontact;
	
	$Ues=$request->get();
	
	$insert=$Model->create($Ues);

}



	//是否报读课程接口
public function yuyue($tell,$comid){

	$has = db('Contact')->where('tell','=',$tell)->where('comid','=',$comid)->find();
	
	$msg = array( array('has' =>'true', ));
	
	$msg1 = array( array('has' =>'flase' , ) );

if(empty($has)){
            
	return json($msg1);

        }else{

	return json($msg);

        }

}




//多条件筛选接口
public function findclass(Request$request){

	// $grade=$_GET['grade'];
	$nianji=$_GET['nianji'];
	$campus=$_GET['campus'];
	$subject=$_GET['subject'];
	$label=$_GET['label'];

	// $ss=json_decode($grade);

	// $cc=implode(' ',$ss);

	$ss=json_decode($nianji);

	$cc=implode(' ',$ss);

	$aa=json_decode($campus);

	$bb=implode(' ',$aa);

	$ee=json_decode($subject);

	$ff=implode(' ',$ee);

	$gg=json_decode($label);

	$hh=implode(' ',$gg);

	$res=Db::table('Classlist')->where('nianji', 'like', "%".$cc."%")->where('campus', 'like', "%".$bb."%")->where('subject', 'like', "%".$ff."%")->where('label', 'like', "%".$hh."%")->select();

	return json($res);




	}




//收藏课程接口
public function fav(Request$request){

	$Model=new Favclass;
	
	$Ues=$request->get();
	
	$insert=$Model->create($Ues);
	
	$classid=$request->get('classid');
	
		$has = db('Favclass')->where('classid','=',$classid)->count();
	
	$update = Db::name('favclass')->where('classid','=',$classid)->update(['rema'=>$has]);
	
	$update1 = Db::name('classlist')->where('id','=',$classid)->update(['rema'=>$has]);
}



//取消收藏课程接口
public function favremove(Request$request){

	$openid=$_GET['openid'];
	$id=$_GET['id'];
	$has = db('User')->where('openid','=',$openid)->find();

	if(empty($has)){
            
	return '非法操作！';

	}else{


	$Model=new Favclass;
	$delete=$Model->where('id','=',$id)->delete();

        }

}


             
//课程评论接口
public function comment(Request$request){

	
	$classid=$_GET['classid'];	

	$res=Comment::table('commentreal')->where('classid','=',$classid)->select();

	return json($res);


}



//课程评论接口
public function goodcomment(Request$request){

	
	$goodid=$_GET['goodid'];	

	$res=Db::table('goodcommentreal')->where('goodid','=',$goodid)->select();

	return json($res);


}


public function commentreal(Request$request){


	$classid=$_GET['classid'];	

	$res=Commentreal::table('Commentreal')->where('classid','=',$classid)->select();
	
	return json($res);


}



//课程收藏数
public function shoucangshu(Request$request){

	$classid=$_GET['classid'];

	$has = db('Favclass')->where('classid','=',$classid)->count();
	

	
	
   
	return json($has);

}


//积分商品参数
public function chanshuinfo(Request$request){

	$goodid=$_GET['goodid'];

	$has = db('goodinfo')->where('goodid','=',$goodid)->select();
   
	return json($has);

}


//查询积分商品接口
public function goodchaxun(){

	$title=$_GET['title'];
       
	$res=DB::name('goods')->where('title', 'like', "%".$title."%")->where('allowed', '=', 1)->order('id desc')->select();

	return json($res);




}


//当前积分商品的所有评论
public function goodcomall(){

	$id=$_GET['id'];
	
	$res=Db::name('goodcommentreal')->where('goodid','=',$id)->select();
	
	return json($res);

}


//积分商品类型
public function kindinfo(Request$request){

	$goodid=$_GET['goodid'];

	$has = db('goodkind')->where('goodid','=',$goodid)->select();
   
	return json($has);

}

//积分商品收藏数
public function goodshoucangshu(Request$request){

	$goodid=$_GET['goodid'];

	$has = db('favgood')->where('goodid','=',$goodid)->count();
	

   
	return json($has);

}


//收藏积分商品接口
public function goodfav(Request$request){


	
	$Ues=$request->get();
	
	$insert=DB::name("favgood")->insert($Ues);
	
		$goodid=$request->get('goodid');
	
	$has = db('favgood')->where('goodid','=',$goodid)->count();
	
	$update = Db::name('favgood')->where('goodid','=',$goodid)->update(['rema'=>$has]);
	
	$update1 = Db::name('goods')->where('id','=',$goodid)->update(['rema'=>$has]);
	
	
	

}



//取消收藏积分商品接口
public function goodfavremove(Request$request){

	$openid=$_GET['openid'];
	$id=$_GET['id'];
	$has = db('User')->where('openid','=',$openid)->find();

	if(empty($has)){
            
	return '非法操作！';

	}else{



	$delete=DB::table("favgood")->where('id','=',$id)->delete();

        }

}



//是否收藏积分商品接口
public function goodfavyes($tell,$goodid){


	$has = db('Favgood')->where('tell','=',$tell)->where('goodid','=',$goodid)->find();
	$msg = array( array('fav' =>'true', ));
	$msg1 = array( array('fav' =>'flase' , ) );

	if(empty($has)){
            
	return json($msg1);

        }else{

	return json($msg);

        }

}





//筛选商品分类为文具
public function goodskind(){
	
	$kind=$_GET['kind'];

	$res=Db::name('goods')->where('kind', 'like', "%".$kind."%")->where('allowed', '=', 1)->order('id desc')->select();
		// $res=Classlist::table('Classlist')->where('grade','=',1)->select();
		
	return json($res);




	}
	
	
//筛选商品价格升降序
public function goodorder(){
	

	$order=$_GET['order'];
	$res=Db::name('goods')->where('allowed', '=', 1)->order("price ".$order."")->select();
		// $res=Classlist::table('Classlist')->where('grade','=',1)->select();
		
	return json($res);




	}	

//筛选商品热度升降序
public function goodhot(){
	

	$order=$_GET['order'];
	$res=Db::name('goods')->where('allowed', '=', 1)->order("rema ".$order."")->select();
		// $res=Classlist::table('Classlist')->where('grade','=',1)->select();
		
	return json($res);




	}	




//兑换商品接口
public function duihuan(Request$request){
	
	// 兑换接口只处理了商品信息为goodkind颜色分类的情况下库存量的计算且用户积分为负数仍可兑换
	
	//商品信息为goodinfo的情况还没有处理逻辑
	$tell=$request->post('tell');
	$name=$request->post('name');
	$adr=$request->post('adr');
	$realadr=$request->post('realadr');
	$price=$request->post('price');
	$goodid=$request->post('goodid');
	$title=$request->post('title');
	$kind=$request->post('kind');
	$openid=$request->post('user');
	$paydate=date("Y-m-d").' '.date("G:i:s");
	$userintegral=DB::name('user')->where('tell','=',$tell)->column('integral');
	$stock= Db::name('goodkind')->where('goodid','=',$goodid)->where('value','=',$kind)->column('stock');
	$stock1= Db::name('goodinfo')->where('goodid','=',$goodid)->where('value','=',$kind)->column('stock');

	
		$has=DB::name('user')->where('openid','=',$openid)->find();
	
	
	if(empty($has)){
		
			return '非法请求！';
		
	}
	

	
		$data=array('title'=>$title,'goodid'=>$goodid,'price'=>$price,'name'=>$name,'tell'=>$tell,'adr'=>$adr,'realadr'=>$realadr,'openid'=>$openid,'date'=>$paydate);
	
		


	$integralfini=$userintegral[0]-$price;
	$errorinfo=array('title'=>'兑换成功');
	$errorinfo1=array('title'=>'兑换失败');
	$errorinfo2=array('title'=>'积分不足！');
	
	
	if($userintegral[0]<$price){
		
		return json($errorinfo2);
	}
	
	
	
	

	
	 $str = implode($stock);
	 $str1 = implode($stock1);
	 
	 
	
	if(empty($str)){
		
		
	}else if($str>0&&$userintegral[0]>=0){
		
	$stockfini=$str-1;
	$res = Db::name('user')->where('tell','=',$tell)->update(['integral'=>$integralfini]);
	$ses = Db::name('goodkind')->where('goodid','=',$goodid)->where('value','=',$kind)->update(['stock'=>$stockfini]);
		
	//将前端提交的商品套餐名和收获地址写入购买数据库
	$insert=Db::name("goodorder")->insert($data);
	
	return json($errorinfo);
			
		}else{
			
			
		return json($errorinfo1);	
		}
		
		
		if(empty($str1)){
		
		
	}else if($str1>0&&$userintegral[0]>=0){
			
	$stockfini1=$str1-1;
	$tes = Db::name('user')->where('tell','=',$tell)->update(['integral'=>$integralfini]);
	$ues = Db::name('goodinfo')->where('goodid','=',$goodid)->where('value','=',$kind)->update(['stock'=>$stockfini1]);
	

		$insert=Db::name("goodorder")->insert($data);
	
		return json($errorinfo);
			
		}else{
			
			
		return json($errorinfo1);
			
		}
	



	// $Model=new Contact;
	
	// $Ues=$request->get();
	
	// $insert=$Model->create($Ues);

}



//积分兑换记录接口
public function goodordersee(Request$request){

	$openid=$request->post('user');
	$has=DB::name('user')->where('openid','=',$openid)->find();
	
	
	if(empty($has)){
		
			return '非法请求！';
		
	}

	

	$res=Db::name('goodorder')->where('openid','=',$openid)->select();


	return json($res);

	}

	
//积分兑换记录接口
public function goodgivedsee(Request$request){

	$openid=$request->post('user');
	$has=DB::name('user')->where('openid','=',$openid)->find();
	
	
	if(empty($has)){
		
			return '非法请求！';
		
	}

	

	$res=Db::name('userintegral')->where('openid','=',$openid)->select();


	return json($res);

	}

public function comto(Request$request){

 	$openid=$_GET['openid'];
 	
	$classid=$_GET['classid'];
	
	$has = db('User')->where('openid','=',$openid)->find();

	if(empty($has)){
            
	return '非法操作！';

    }else{

	$Model=new Comment;
	
	$Ues=$request->get();
	
	$insert=$Model->create($Ues);

     }




}

public function commenthas(){

	$classid=$_GET['classid'];
	
	$has = db('Commentreal')->where('classid','=',$classid)->find();
	
	$msg = array( array('opp' =>'true', ));
	
	$msg1 = array( array('opp' =>'flase' , ));

	if(empty($has)){
            
              return json($msg1);

        }else{
        	
	return json($msg);

        }

}



public function goodcomto(Request$request){

 	$openid=$_GET['openid'];
 	
	$goodid=$_GET['goodid'];
	
	$has = db('User')->where('openid','=',$openid)->find();

	if(empty($has)){
            
	return '非法操作！';

    }else{

	$Ues=$request->get();
	
	$insert=Db::name("goodcomment")->insert($Ues);

     }




}


//判断商品评论是否存在
public function goodcommenthas(){

	$goodid=$_GET['goodid'];
	
	$has = db('goodcommentreal')->where('goodid','=',$goodid)->find();
	
	$msg = array( array('opp' =>'true', ));
	
	$msg1 = array( array('opp' =>'flase' , ));

	if(empty($has)){
            
              return json($msg1);

        }else{
        	
	return json($msg);

        }

}




//小程序支付信息payinfo的获取
public function jspay($url,$openid,$fee) {    
   

	$mima=rand(97,1223);
	
	$timestamp = time();
	
	$date = date('Y-m-d H:m:s',$timestamp);
	
	$date1 = date('YmdHms',$timestamp);
	
	$trade=$mima.$date1;

  //GET/POST所需参数的字符串连接在一起
  $c="appid=wxa8f63265510d5a42&body=test&device_info=1000&mch_id=1602907588&nonce_str=ibuaiVcKdpRxkhJA&notify_url=www.bcjy.online&openid=".$openid."&out_trade_no=".$trade."&spbill_create_ip=47.108.116.8&total_fee=".$fee."&trade_type=JSAPI&key=CAIYIHUIzhangqianhuacaiyongsheng";

//进行MD5加密
$sign=md5($c);

//将全部字母转换为大写得到签名
$upper = strtoupper($sign);

//下面是官方签名生成器地址
//https://pay.weixin.qq.com/wiki/tools/signverify/

//将要提交的数据以XML格式存储 其中sign项为：加密且大写的POST字符串（签名）
//如果支付方式为JSAPI或在小程序内，则需要多提交一个参数：openid（注：小程序和公众号的openid不一致）
$data="<xml>
<appid>wxa8f63265510d5a42</appid>
<body>test</body>
<device_info>1000</device_info>
<mch_id>1602907588</mch_id>
<nonce_str>ibuaiVcKdpRxkhJA</nonce_str>
<notify_url>www.bcjy.online</notify_url>
<openid>".$openid."</openid>
<out_trade_no>".$trade."</out_trade_no>
<spbill_create_ip>47.108.116.8</spbill_create_ip>
<total_fee>".$fee."</total_fee>
<trade_type>JSAPI</trade_type>
<sign>".$upper."</sign>
</xml>";

//以POST形式提交XML到微信接口

        //构造AJAX格式的请求头
    $options = array(    
                'http' => array(    
                    'method' => 'POST',    
                    'header' => 'Content-type:application/x-www-form-urlencoded',    
                    'content' => $data,    
                    'timeout' => 15 * 60 // 超时时间（单位:s）    
                ) 
            );
    $context = stream_context_create($options);   
    //访问接口（路径为$url）并接收返回值 
    $result = file_get_contents($url, true, $context);
    $ua=substr($result,399,36);//prepay_id
	// echo $ua;
	//生成小程序的签名paySign，其中prepay_id为访问后统一下单接口得到的值中的prepay_id的值
	$pays = MD5("appId=wxa8f63265510d5a42&nonceStr=ibuaiVcKdpRxkhJA&package=prepay_id=".$ua."&signType=MD5&timeStamp=1589865115&key=CAIYIHUIzhangqianhuacaiyongsheng");
    $paySign= strtoupper($pays);
    // echo $paySign;


    $payinfo = array(

     	array('prepay_id' => $ua,'paySign' => $paySign,)

     );


	//注释此行以屏蔽支付 return  json($payinfo); 
	
    

   
         
    }










//公众号支付信息payinfo的获取
public function gzhpay($url,$openid,$fee) {    
   

	$mima=rand(1000,1223);


	$timestamp = time();
	$date = date('Y-m-d H:m:s',$timestamp);
	$date1 = date('YmdHms',$timestamp);
	$trade=$mima.$date1;


      
	//GET/POST所需参数的字符串连接在一起
	$c="appid=wxfd401461261cc2f8&body=test&device_info=1000&mch_id=1602907588&nonce_str=ibuaiVcKdpRxkhJA&notify_url=www.bcjy.online&openid=".$openid."&out_trade_no=".$trade."&spbill_create_ip=47.108.116.8&total_fee=".$fee."&trade_type=JSAPI&key=CAIYIHUIzhangqianhuacaiyongsheng";





	//进行MD5加密
	$sign=md5($c);

	//将全部字母转换为大写得到签名
	$upper = strtoupper($sign);



// echo $upper;

//下面是官方签名生成器地址
//https://pay.weixin.qq.com/wiki/tools/signverify/

//将要提交的数据以XML格式存储 其中sign项为：加密且大写的POST字符串（签名）
//如果支付方式为JSAPI或在小程序内，则需要多提交一个参数：openid（注：小程序和公众号的openid不一致）
// $data="<xml>
// <appid>wxfd401461261cc2f8</appid>
// <body>test</body>
// <device_info>1000</device_info>
// <mch_id>1602907588</mch_id>
// <nonce_str>ibuaiVcKdpRxkhJA</nonce_str>
// <notify_url>www.bcjy.online</notify_url>
// <openid>".$openid."</openid>
// <out_trade_no>20150806125346</out_trade_no>
// <spbill_create_ip>47.108.116.8</spbill_create_ip>
// <total_fee>".$fee."</total_fee>
// <trade_type>JSAPI</trade_type>
// <sign>".$upper."</sign>
// </xml>";

$data="<xml>
	<appid>wxfd401461261cc2f8</appid>
	<body>test</body>
	<device_info>1000</device_info>
	<mch_id>1602907588</mch_id>
	<nonce_str>ibuaiVcKdpRxkhJA</nonce_str>
	<notify_url>www.bcjy.online</notify_url>
	<openid>".$openid."</openid>
	<out_trade_no>".$trade."</out_trade_no>
	<spbill_create_ip>47.108.116.8</spbill_create_ip>
	<total_fee>".$fee."</total_fee>
	<trade_type>JSAPI</trade_type>
	<sign>".$upper."</sign>
</xml>";



// <out_trade_no>".$trade."</out_trade_no>



//以POST形式提交XML到微信接口

    //构造AJAX格式的请求头
    $options = array(    
                'http' => array(    
                    'method' => 'POST',    
                    'header' => 'Content-type:application/x-www-form-urlencoded',    
                    'content' => $data,    
                    'timeout' => 15 * 60 // 超时时间（单位:s）    
                )    
            );    
    $context = stream_context_create($options);   
    //访问接口（路径为$url）并接收返回值 
    $result = file_get_contents($url, false, $context);  
	$ua=substr($result,399,36);//prepay_id
  

    // echo $ua;


 	  //生成小程序的签名paySign，其中prepay_id为访问后统一下单接口得到的值中的prepay_id的值
	$pays = MD5("appId=wxfd401461261cc2f8&nonceStr=ibuaiVcKdpRxkhJA&package=prepay_id=".$ua."&signType=MD5&timeStamp=1760930175&key=CAIYIHUIzhangqianhuacaiyongsheng");
    $paySign= strtoupper($pays);     
     // echo $paySign;


    $payinfo = array(

     	array('prepay_id' => $ua,'paySign' => $paySign,)

     );


	

	return  json($payinfo);


         
    }


	

	 		

public function consee(Request$request){


	$tell=$_GET['tell'];	

	$res=Contact::table('Contact')->where('tell','=',$tell)->select();

	return json($res);

	}




//收藏夹接口
public function favsee(Request$request){

	$tell=$_GET['tell'];	

	$res=Favclass::table('Favclass')->where('tell','=',$tell)->select();


	return json($res);

}




//是否报读课程接口
public function favyes($tell,$classid){


	$has = db('Favclass')->where('tell','=',$tell)->where('classid','=',$classid)->find();
	$msg = array( array('fav' =>'true', ));
	$msg1 = array( array('fav' =>'flase' , ) );

	if(empty($has)){
            
	return json($msg1);

        }else{

	return json($msg);

        }

}


//查询课程的接口
public function chaxun(){

	$title=$_GET['title'];
       
	$res=Classlist::table('Classlist')->where('title', 'like', "%".$title."%")->order('id desc')->select();

	return json($res);




}



//随机排列的所有积分商品接口
public function goods(){

	$res=Db::table('goods')->where('allowed', '=', 1)->orderRaw('rand()')->select();
		
	return json($res);

}


//积分商详情页轮播数据
public function goodinfo(){

	$id=$_GET['id'];
	
	$res=Db::table('goods')->where('allowed', '=', 1)->where('id','=',$id)->select();
		
	return json($res);

}

//积分商品详情页数据
public function goodimgs(){

	$id=$_GET['id'];
	
	$res=Db::table('goodimgs')->where('goodid','=',$id)->select();
		
	return json($res);

}


//积分商品收藏夹
public function favgood(Request$request){

	$tell=$_GET['tell'];

	$res=Db::name('favgood')->where('tell','=',$tell)->select();

	return json($res);

}


//随机排列的所有课程接口
public function all(){

	$res=Classlist::table('Classlist')->orderRaw('rand()')->select();
		
	return json($res);

}



//轮播图接口
public function banner(){

	$res=Banner::table('Banner')->select();
		
	return json($res);

}




//收藏夹接口
public function favlist(){

	$tell=$_GET['tell'];

	$res=Favclass::table('Favclass')->where('tell','=',$tell)->select();
		
	return json($res);

}


//深受喜爱的课程接口
public function pop(){


	$res=Classlist::table('Classlist')->where('pop','=',1)->select();
		
	return json($res);

}



//上推荐页的课程接口
public function hot(){


	$res=Classlist::table('Classlist')->where('hot','=',1)->select();
		
	return json($res);


}


//享有优惠的课程接口
public function little(){


	$res=Classlist::table('Classlist')->where('little','=',1)->select();
		
	return json($res);

}





//少量余位的中军课程
public function zhongjunhot(){


	$res=Classlist::table('Classlist')->where('zhongjunhot','=',1)->select();
		
	return json($res);


}



//学段筛选接口
public function xueduan(){
	
	$xueduan=$_GET['xueduan'];

	$res=Classlist::table('Classlist')->where('grade', 'like', "%".$xueduan."%")->order('id desc')->select();
		// $res=Classlist::table('Classlist')->where('grade','=',1)->select();
		
	return json($res);




	}

//按班型筛选接口
public function classtype(){

	$classtype=$_GET['classtype'];
	$res=Classlist::table('Classlist')->where('label','=',$classtype)->select();
		
	return json($res);
		
}





//按科目筛选接口
public function subjectkind(){

	$subject=$_GET['subject'];

	$res=Classlist::table('Classlist')->where('subject','=',$subject)->select();
		
	return json($res);




	}

//按校区筛选课程
public function campus(){
	
	$campus=$_GET['campus'];

	$res=Classlist::table('Classlist')->where('campus', 'like', "%".$campus."%")->order('id asc')->select();
	
	return json($res);

}



//每个老师的课程表
public function kechenginfo(){

	$classid=$_GET['classid'];
	
	$res=Classinfo::table('Classinfo')->where('classid','=',$classid)->select();
		
	return json($res);

}



//老师详情页数据
public function classinfo(){

	$id=$_GET['id'];
	
	$res=Classlist::table('Classlist')->where('id','=',$id)->select();
		
	return json($res);

}


//详情页推荐课程
public function classother(){

	$subject=$_GET['subject'];
	
	$label=$_GET['label'];
	
	$res=Classlist::table('Classlist')->orderRaw('rand()')->limit(6)->where('subject','neq',$subject)->where('label','=',$label)->select();
	//找到当前记录的subject并随机返回除这个学科以外的数据
	return json($res);

}



//收藏课程接口
public function zuhe(Request$request){

	$res=Classlist::table('Zuhe')->select();
		
	return json($res);

}


//当前老师的所有评论
public function comall(){

	$id=$_GET['id'];
	
	$res=Commentreal::table('Commentreal')->where('classid','=',$id)->select();
	
	return json($res);

}


//微信验证TOKEN
private function checkSignature()
{
    $signature = $_GET["signature"];
    $timestamp = $_GET["timestamp"];
    $nonce = $_GET["nonce"];
    $token = TOKEN;
    $tmpArr = array($token, $timestamp, $nonce);
    sort($tmpArr, SORT_STRING);
    $tmpStr = implode( $tmpArr );
    $tmpStr = sha1( $tmpStr );

    if( $tmpStr == $signature ){
        return true;
    }else{
        return false;
    }
}


//小程序获取手机号getPhoneNumber函数的后台请求方法
public function gettell(Request$request){
	

	
	
	$iv =$request->post("iv");
	$encryptedData = $request->post("encryptedData");
		$json=$request->post("sessionKey"); 
		
		$str = stripslashes($json); 
$sessionKey = json_decode($str,true);
		
		
	
		
	//sessionKey是用户登录页denglu函数request成功后返回的的data里的session_Key,建议用wx.setStorageSync()写入小程序缓存;

		//加载extend目录下的插件
	include_once "D:/wwwroot/www.bcjy.online/extend/GETTELL/demo.php";

}





	
}
