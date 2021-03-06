<?php if (!defined('THINK_PATH')) exit();?><style>
    .user-details {position: relative; padding: 0;}
    .user-details .user-image {position: relative;  z-index: 1; width: 100%; text-align: center;}
    .user-image img { clear: both; margin: auto; position: relative;width:100px !important;height:100px !important;}
    .user-details .user-info-block {width: 100%; position: absolute; top: 55px; background: rgb(255, 255, 255); z-index: 0; padding-top: 35px;}
    .user-info-block .user-heading {width: 100%; text-align: center; margin: 10px 0 0;}
    .user-info-block .navigation {float: left; width: 100%; margin: 0; padding: 0; list-style: none; border-bottom: 1px solid #428BCA; border-top: 1px solid #428BCA;}
    .navigation li {float: left; margin: 0; padding: 0;}
    .navigation li a {padding: 20px 30px; float: left;}
    .navigation li.active a {background: #428BCA; color: #fff;}
    .user-info-block .user-body {float: left; padding: 2%; width: 100%;}
    .user-body .tab-content > div {float: left; width: 100%;}
    .user-body .tab-content h4 {width: 100%; margin: 10px 0; color: #333;font-weight: bold;}
	.fileUpload {
		position: relative;
		overflow: hidden;
		margin: 10px;
		width:100%;
	}
	.fileUpload input.upload {
		position: absolute;
		top: 0;
		right: 0;
		margin: 0;
		padding: 0;
		font-size: 20px;
		cursor: pointer;
		opacity: 0;
		filter: alpha(opacity=0);
	}
	.myimg-circle{
		width:120px;
		height:120px;
		-webkit-border-radius: 50em;
		-moz-border-radius: 50em;
		border-radius: 50em;
		cursor: pointer;
	}
	.myimg-circle:hover{
		box-shadow: 0px 0px 20px #000000;
	}
	.user-info-block{
        background-color: #fff;
        padding: 20px;
        box-shadow: 1;
        background-color: #fff;
        margin-bottom: 20px;
        border: 1px solid #d4d4d4;
        border-radius: 5px;
        -moz-box-shadow: 0 2px 10px rgba(0, 0, 0, 0.175);
        -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, 0.175);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.175);
    }
    .img-circle{
        box-shadow: 1;
        border: 1px solid #d4d4d4;
        -moz-box-shadow: 0 2px 10px rgba(0, 0, 0, 0.175);
        -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, 0.175);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.175);
    }
    .activity-subject{
		color:#337ab7;
    }
	@media(max-width:767px){
		.img-xs-center{
			text-align: center;
		}
		
		.user-image img {
			width:70px !important;
			height:70px !important;
		}
		
		.myimg-circle{
			width:100px;
			height:100px;
		}
	}
</style>
<div class="content">
    <div class="row">
        <div class="col-sm-12 col-md-12 user-details">
            <div class="user-image">
                <img src="http://scap.mama.cn/upload/avatar/thumbmini_<?php echo ($user["avatar"]); ?>" class="img-circle" style="cursor: pointer;" onclick="loadPageProfile(<?php echo ($user["uid"]); ?>);" >
            </div>
            <div class="user-info-block">
                <div class="user-heading">
                    <h3><?php echo ($user["username"]); ?></h3>
                    <span class="help-block"><?php echo ($user["profile"]); ?></span>
                </div>
                <ul class="navigation">
                    <li class="active">
                        <a data-toggle="tab" href="#information">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#changepassword">
                            <span class="glyphicon glyphicon-star"></span>
                        </a>
                    </li>                    
                    <li>
                        <a data-toggle="tab" href="#activitylist">
                            <span class="glyphicon glyphicon-flag"></span>
                        </a>
                    </li>
                </ul>
                <div class="user-body">
                    <div class="tab-content">
                    <!-- 修改用户信息 -->
                        <div id="information" class="tab-pane active">
                            <form class="form-horizontal" role="form" id="profileform" action="http://scap.mama.cn/Home/User/editProfile" enctype="multipart/form-data" method="post">
                            
                            <div class="form-group" style="display: none;">
									<div class="col-md-4 col-md-offset-4 col-xs-12">
										<div class="fileUpload btn btn-primary">
											<span>上传头像</span>
									   		 <input id="uploadBtn" type="file" class="upload" name='pic'  id="pic" onchange="handleFiles(this)" accept="image/*"/>
									    </div>
								    </div>
								</div>
								<div class="form-group text-center">
									<div class="col-md-4 col-md-offset-4 col-xs-12 img-xs-center">
								   		 <div id="picdiv">
											<img id="img" class="myimg-circle" src="http://scap.mama.cn/upload/avatar/thumbmini_<?php echo (session('avatar')); ?>"/>
										</div>
								    </div>
								</div>
								
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">*邮箱地址:</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="email"  id="email" maxlength="120" placeholder="请设置用户邮箱地址(推荐企业邮箱)" value="<?php echo ($user["email"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="profile">公司职位:</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="profile"  id="profile" maxlength="20" placeholder="例如:产品研发-PHP工程师" value="<?php echo ($user["profile"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="mobile">手机号码:</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="mobile"  id="mobile" maxlength="20" placeholder="填写手机号码方便联系" value="<?php echo ($user["mobile"]); ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-4">
                                        <button type="submit" class="btn btn-danger" style="width: 100%" id="submit-info" data-loading-text="正在提交..." autocomplete="off">修改</button>
                                    </div>
                                </div>
                                
                                <div class="form-group">
									<div class="col-md-offset-4 col-md-4 col-md-12">
										<div class="progress" style="display:none ;width:100%;">
						  			    	<div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 100%"></div>
						                </div>
									</div>
								</div>
                            </form>
                        </div>
                        <!--/修改用户信息 -->
                        
                        <!-- 修改用户密码 -->
                        <div id="changepassword" class="tab-pane">
                            <form class="form-horizontal" role="form" >
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="oldpsw">*旧密码:</label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" name="oldpsw"  id="oldpsw" maxlength="20" placeholder="请输入旧密码" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="newpsw">*新密码:</label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" name="newpsw"  id="newpsw" maxlength="20" placeholder="请设置新的密码" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="cfmpsw">*密码确认:</label>
                                    <div class="col-md-4">
                                        <input type="password" class="form-control" name="cfmpsw"  id="cfmpsw" maxlength="20" placeholder="重新输入新密码" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-4 col-md-4">
                                        <button type="button" class="btn btn-danger" style="width: 100%" id="submit-psw" data-loading-text="正在提交..." autocomplete="off">修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /修改用户密码 -->    
						<!-- 我的活动 -->
                        <div id="activitylist" class="tab-pane">
                        	<div class="row" style="width:100%">
							  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
							    <h4>我的活动</h4>
							      <div class="table-responsive">
							        <table id="mytable" class="table table-bordered table-striped  table-hover">
							          <thead>
							            <tr>
							              <th class="text-center">活动标题</th>
							              <th class="text-center">报名人数</th>
							              <th class="text-center">状态</th>
							              <th class="text-center">操作</th>
							            </tr>
							          </thead>
							          <tbody>
							          <?php if(is_array($activities)): $i = 0; $__LIST__ = $activities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$activity): $mod = ($i % 2 );++$i;?><tr id="tr_<?php echo ($activity["aid"]); ?>">
							              <td><a class="activity-subject" data-aid=<?php echo ($activity["aid"]); ?> href="javascript:;" style=""><?php echo ($activity["subject"]); ?> </a><?php if($activity['isfounder']){ ?><span class="glyphicon glyphicon-star-empty"><?php } ?></span></td>
							              <td class="text-center"><?php echo ($activity["members_num"]); ?></td>
							              <td class="text-center"><label id="status_<?php echo ($activity["aid"]); ?>" class="label <?php if($activity['status']==0){echo 'label-info';}elseif($activity['status']==1){echo'label-primary';}elseif($activity['status']==2){echo'label-warning';}elseif($activity['status']==10){echo'label-danger';}elseif($activity['status']<0){echo'label-default';} ?>"><?php echo ($activity["status_info"]); ?></label></td>
							              	<td class="text-center"><p>
							              	<?php if($activity['isfounder'] && in_array($activity['status'],array(0,1,2))){ ?>
							              		<button class="btn btn-danger btn-xs cancelactivity" data-toggle="tooltip" data-placement="top" title="取消活动" data-aid="<?php echo ($activity["aid"]); ?>" ><span class="glyphicon glyphicon-remove"></span></button>
							            	<?php } ?>
							            	
							            	<?php if($activity['isfounder'] && $activity['status']==0 ){ ?>
							              		<button class="btn btn-warning btn-xs stopjoin" data-toggle="tooltip" data-placement="top" title="停止报名" data-aid="<?php echo ($activity["aid"]); ?>" ><span class="glyphicon glyphicon-minus-sign"></span></button>
							            	<?php } ?>
							            	
							            	<?php if(!$activity['isfounder'] && in_array($activity['status'],array(0,1,2))){ ?>
							              		<button class="btn btn-primary btn-xs exitactivity" data-toggle="tooltip" data-placement="top" title="退出活动" data-aid="<?php echo ($activity["aid"]); ?>" ><span class="glyphicon glyphicon-log-out"></span></button>
							            	<?php } ?>
							            	<?php if($activity['isfounder']){ ?>
							            	<button class="btn btn-danger btn-xs delactivity" data-toggle="tooltip" data-placement="top" title="删除活动" data-aid="<?php echo ($activity["aid"]); ?>" ><span class="glyphicon glyphicon-trash"></span></button>
							            	<?php } ?>
							            	
							            	</p></td>
							            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
							          </tbody>
							        </table>
							      </div>
							  </div>
							</div>
                        </div>
                        <!-- /我的活动 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
    	$("[data-toggle='tooltip']").tooltip();
    	
    	$("#profileform").on("submit",function(event){
        	event.preventDefault();
            var formData = new FormData($(this)[0]);
            var url = $(this).attr('action');
            $.ajax({
                type:'POST',
                 url:url,
                data:formData,
                async: true,
    	        cache: false,
    	        contentType: false,
    	        processData: false,
                complete:function(){
                    $btn.button('reset');
                },
                beforeSend:function(){
    	        	$('.progress').show();
    	        },
    	        complete:function(){
    	       		$('.progress').hide();
    	        },
                success:function(data){
                    if(data.code>0){
                        swal({
                            title:"成功",
                            text :"用户信息修改成功!",
                            type :"success",
                            confirmButtonColor:"#3B5999",
                            confirmButtonText: "OK"
                        },function(isConfirm){
                            setTimeout(function(){
                                location.href="http://scap.mama.cn/Home/Main/index";
                            },500);
                        });
                    }else{
                        swal({
                            title:"失败",
                            text :data.error,
                            type :"error",
                            confirmButtonColor:"#3B5999",
                            confirmButtonText: "OK",
                            allowOutsideClick:true
                        });
                    }
                }
            });

        });

        $("#submit-psw").on("click",function(){
            var oldpsw = $.trim($('#oldpsw').val());
            var newpsw = $.trim($('#newpsw').val());
            var cfmpsw = $.trim($('#cfmpsw').val());
            var $btn = $(this).button('loading')
            $.ajax({
                type:'post',
                url:'http://scap.mama.cn/Home/User/changePassword',
                data:{oldpsw:oldpsw,newpsw:newpsw,cfmpsw:cfmpsw},
                complete:function(){
                    $btn.button('reset');
                },
                success:function(data){
                    if(data.code>0){
                        swal({
                            title:"成功",
                            text :"密码修改成功!",
                            type :"success",
                            confirmButtonColor:"#3B5999",
                            confirmButtonText: "OK"
                        },function(isConfirm){
                            setTimeout(function(){
                                location.href="http://scap.mama.cn/Home/Login/index";
                            },500);
                        });
                    }else{
                        swal({
                            title:"失败",
                            text :data.error,
                            type :"error",
                            confirmButtonColor:"#3B5999",
                            confirmButtonText: "OK",
                            allowOutsideClick:true
                        });
                    }
                }
            });

        });
               
        $(".activity-subject").on("click",function(){
        	var aid = $(this).data('aid');
        	loadPageActivityInfo(aid);
        });
        $(".exitactivity").on('click',function(){
        	var obj = $(this);
        	swal({
        		title: "提示",
   				text: "是否确认退出该活动?",
   				type: "warning",
   				showCancelButton: true,
   				confirmButtonColor: "#DD6B55",
   				confirmButtonText: "确认",
   				cancelButtonText:"点错了",
   				closeOnConfirm: false }, 
   				function(isConfirm){
   					if(isConfirm){
   						var aid = obj.data('aid');
   						$.ajax({
   			        		type:'post',
   			        		url:'http://scap.mama.cn/Home/Activity/exitActivity',
   			        		data:{aid:aid},
   			        		success:function(data){
   			        			if(data.code>0){
   			    					swal({
   			    						title:"成功",
   			    						text :"已退出该活动",
   			    						type :"success",
   			    						confirmButtonColor:"#3B5999",
   			    						confirmButtonText: "OK"
   			    					},function(){
   			    						$("#tr_"+aid).remove();
   			    					});
   			    				}else if(data.code<0){
   			    					swal({
   			    						title:"失败",
   			    						text :data.error,
   			    						type :"error",
   			    						confirmButtonColor:"#3B5999",
   			    						confirmButtonText: "OK",
   			    						allowOutsideClick:true
   			    				    });
   			    				}
   			        		}
   			        	});
   					}
   				}
   			);
        });
        
        $(".cancelactivity").on('click',function(){
        	var obj = $(this);
        	swal({
        		title: "提示",
   				text: "是否确认取消该活动?",
   				type: "warning",
   				showCancelButton: true,
   				confirmButtonColor: "#DD6B55",
   				confirmButtonText: "确认",
   				cancelButtonText:"点错了",
   				closeOnConfirm: false }, 
   				function(isConfirm){
   					if(isConfirm){
   						var aid = obj.data('aid');
   						$.ajax({
   			        		type:'post',
   			        		url:'http://scap.mama.cn/Home/Activity/cancelActivity',
   			        		data:{aid:aid},
   			        		success:function(data){
   			        			if(data.code>0){
   			    					swal({
   			    						title:"成功",
   			    						text :"活动已被取消",
   			    						type :"success",
   			    						confirmButtonColor:"#3B5999",
   			    						confirmButtonText: "OK"
   			    					},function(){
   			    						$("#status_"+aid).attr('class',"label label-default");
   			    						$("#status_"+aid).text("已经取消");
   			    						obj.remove();
   			    					});
   			    				}else if(data.code<0){
   			    					swal({
   			    						title:"失败",
   			    						text :data.error,
   			    						type :"error",
   			    						confirmButtonColor:"#3B5999",
   			    						confirmButtonText: "OK",
   			    						allowOutsideClick:true
   			    				    });
   			    				}
   			        		}
   			        	});
   					}
   				}
   			);
        });
        $(".delactivity").on('click',function(){
        	var obj = $(this);
        	swal({
        		title: "提示",
   				text: "真的要删除该活动吗(无法恢复)?",
   				type: "warning",
   				showCancelButton: true,
   				confirmButtonColor: "#DD6B55",
   				confirmButtonText: "嗯!",
   				cancelButtonText:"手抖了",
   				closeOnConfirm: false }, 
   				function(isConfirm){
   					if(isConfirm){
   						var aid = obj.data('aid');
   						$.ajax({
   			        		type:'post',
   			        		url:'http://scap.mama.cn/Home/Activity/delActivity',
   			        		data:{aid:aid},
   			        		success:function(data){
   			        			if(data.code>0){
   			    					swal({
   			    						title:"成功",
   			    						text :"活动已被删除",
   			    						type :"success",
   			    						confirmButtonColor:"#3B5999",
   			    						confirmButtonText: "OK"
   			    					},function(){
   			    						$("#tr_"+aid).remove();
   			    					});
   			    				}else if(data.code<0){
   			    					swal({
   			    						title:"失败",
   			    						text :data.error,
   			    						type :"error",
   			    						confirmButtonColor:"#3B5999",
   			    						confirmButtonText: "OK",
   			    						allowOutsideClick:true
   			    				    });
   			    				}
   			        		}
   			        	});
   					}
   				}
   			);
        });
        
        $(".stopjoin").on('click',function(){
        	var obj = $(this);
        	swal({
        		title: "提示",
   				text: "是否确认停止报名?",
   				type: "warning",
   				showCancelButton: true,
   				confirmButtonColor: "#DD6B55",
   				confirmButtonText: "确认",
   				cancelButtonText:"手抖了",
   				closeOnConfirm: false }, 
   				function(isConfirm){
   					if(isConfirm){
   						var aid = obj.data('aid');
   						$.ajax({
   			        		type:'post',
   			        		url:'http://scap.mama.cn/Home/Activity/stopJoin',
   			        		data:{aid:aid},
   			        		success:function(data){
   			        			if(data.code>0){
   			    					swal({
   			    						title:"成功",
   			    						text :"活动已停止报名",
   			    						type :"success",
   			    						confirmButtonColor:"#3B5999",
   			    						confirmButtonText: "OK"
   			    					},function(){
   			    						$("#status_"+aid).attr('class',"label label-warning");
   			    						$("#status_"+aid).text("停止报名");
   			    						obj.remove();
   			    					});
   			    				}else if(data.code<0){
   			    					swal({
   			    						title:"失败",
   			    						text :data.error,
   			    						type :"error",
   			    						confirmButtonColor:"#3B5999",
   			    						confirmButtonText: "OK",
   			    						allowOutsideClick:true
   			    				    });
   			    				}
   			        		}
   			        	});
   					}
   				}
   			);
        });
    });
    
    $("#picdiv").on("click",function(){
    	$("#uploadBtn").click();
    })
    window.URL = window.URL || window.webkitURL;
    function handleFiles(obj) {
    	var fileElem = document.getElementById("pic"),
        fileList = document.getElementById("picdiv");
          oldImg = document.getElementById("imglink") ? document.getElementById("imglink") : document.getElementById("img");
    	var files = obj.files,
    		img = new Image();
    	if(window.URL){
    		//File API
    	      img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是本地路径
    	      img.width = 120;
    	      img.height = 120;
    	      img.id = 'img';
    	      img.onload = function(e) {
    	         window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
    	      }
    	      fileList.replaceChild(img,oldImg);
    	}else if(window.FileReader){
    		//opera不支持createObjectURL/revokeObjectURL方法。用FileReader对象来处理
    		var reader = new FileReader();
    		reader.readAsDataURL(files[0]);
    		reader.onload = function(e){
    			img.src = this.result;
    			img.width = 120;
    			img.height = 120;
    			fileList.replaceChild(img,oldImg);
    		}
    	}else{
    		//ie
    		obj.select();
    		var nfile = document.selection.createRange().text;
    		document.selection.empty();
    		fileList.innerHTML="";
    	    fileList.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(enanble = 'true',sizingMethod='scale',src='"+nfile+"')";
    	}
    	$("#img").attr("class","myimg-circle");
    }
</script>