<?php

  require_once 'file.func.php';

    $act=$_REQUEST['act'];
    $path="file";
    $path=$_REQUEST['path'] ? $_REQUEST['path'] : $path;
    $allFiles=readDirectory($path);

    $filename=$_REQUEST['filename'];
    $dirname=$_REQUEST['dirname']; //目录名字

    $redirect="index.php?path={$path}";
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Insert title here</title>
        <link rel="stylesheet" href="cikonss.css" />
        <script src="jquery-ui/js/jquery-1.10.2.js"></script>
        <script src="jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="jquery-ui/js/jquery-ui-1.10.4.custom.min.js"></script>
        <link rel="stylesheet" href="jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" type="text/css" />
        <script type="text/javascript" src="layer/layer.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="./js/index.js"></script>

        <body>
            <?php  
                if(!!$act){
            ?>
                <div class="act-show-box">
                <?php 
                    //把文件内容读取村来
                    if($act=="showContent"){
                        $content=file_get_contents($filename);
                       if(strlen($content)){
                            $newContent=highlight_string($content,true);
                ?>      
                        <textarea style="height: 350px;border:5px solid #f60; width: 100%;">
                            <?php echo  $newContent;?>
                        </textarea>
                <?php           
                       }else{
                ?>  
                            <div class="show-content-nodata">
                                    这个文件没有文字内容！
                            </div>
                <?php      
                       }
                ?>
                        
                <?php        
                    }elseif($act=="editContent"){
                ?>
                        <form  action="index.php?act=doEdit" method="post">
                            <textarea name='content' style="height: 350px;border:5px solid #f60; width: 100%;">
                                <?php echo  file_get_contents($filename);?>
                            </textarea>
                            <input type='hidden' name='filename' value="<?php echo $filename; ?>" />
                            <input type="hidden" name="path" value="<?php echo $path; ?>" />
                            <input type="submit" value="保存修改">
                        </form>
                        
                        
                <?php
                    }elseif ($act=="doEdit") {
                       $content=$_REQUEST['content'];
                       if(file_put_contents($filename,$content)){
                          $mes="文件修改成功";
                       }else{
                            $mes="文件修改失败";
                       }
                       alertMes($mes,$redirect);
                    }elseif ($act=="renameFile") {
                ?>
                        <div class="rename-show-box">
                            <form action="index.php?act=doRename" method="post">
                                <div class="item">
                                    <label>原始名字:</label>
                                    <span><?php echo $filename; ?></span>
                                </div>

                                <div class="item">
                                    <label>请填写新文件名:</label>
                                    <span><input type="text" name='newname' /></span>

                                    <input type='hidden' name='filename' value='<?php echo $filename; ?>' />
                                </div>
                                <input type="submit" value="提交" />
                            </form>
                        </div>      

                <?php        
                    }elseif($act=="doRename"){
                        $newname=$_REQUEST['newname'];
                        $mes=renameFile($filename,$newname);
                        alertMes($mes,$redirect);
                    }elseif($act=="copyFile"){


                ?>
                        <div class="copyfile-show-box">
                                <form action="index.php?act=doCopyFile" method="post">
                                    <div class="item">
                                        <label>原始名字:</label>
                                        <span><?php echo $filename; ?></span>
                                    </div>

                                    <div class="item">
                                        <label>将文件复制到：</label>
                                        <input type="text" name="distname" placeholder="将文件复制到" />
                                        <input type="hidden" name="path" value="<?php echo $path; ?>" />
                                        <input type='hidden' name='filename' value='<?php echo $filename ?>' />
                                    </div>
                                    <input type="submit" value="提交" />
                                </form>
                        </div>    
                <?php        
                    }elseif($act=="doCopyFile"){

                        $newDistName=$_REQUEST['distname'];

                        $mes=copyFile($filename,$path."/".$newDistName);
                        alertMes($mes,$redirect);

                    }else if($act=="cutFile"){
                ?>
                        <div class="cutFile-show-box">
                                <form action="index.php?act=doCutFile" method="post">
                                    <div class="item">
                                        <label>原始名字:</label>
                                        <span><?php echo $filename; ?></span>
                                    </div>

                                    <div class="item">
                                        <label>将文件剪切到：</label>
                                        <input type="text" name="distname" placeholder="将文件复制到" />
                                        <input type="hidden" name="path" value="<?php echo $path; ?>" />
                                        <input type='hidden' name='filename' value='<?php echo $filename ?>' />
                                    </div>
                                    <input type="submit" value="提交" />
                                </form>
                        </div>    
                        
                <?php        
                    }elseif($act=="doCutFile"){
                        $newDistName=$_REQUEST['distname'];
                        $mes=cutFile($filename,$path."/".$newDistName);
                        alertMes($mes,$redirect);
                ?>
                        
                <?php        
                    }elseif($act=="delFile"){

                        $mes=delFile($filename);    
                        alertMes($mes,$redirect);
                    }elseif($act=="downFile"){
                        downFile($filename);
                    }elseif($act=="renameFolder"){
                ?>
                        <div class="renameFolder-show-box">
                                <form action="index.php?act=doRenameFolder" method="post">
                                    <div class="item">
                                        <label>原始名字:</label>
                                        <span><?php echo $dirname; ?></span>
                                    </div>

                                    <div class="item">
                                        <label>请填写新文件夹名</label>
                                        <input type="text" name="newname" placeholder="请输入你要修改成的文件名" />
                                        <input type="hidden" name="path" value="<?php echo $path; ?>" />
                                        <input type='hidden' name='dirname' value='<?php echo $dirname ?>' />
                                    </div>
                                    <input type="submit" value="提交" />
                                </form>
                        </div>    
                <?php        
                    }elseif($act=="doRenameFolder"){
                        $newname=$_REQUEST['newname'];
                       
                        $mes=renameFolder($dirname,$path."/".$newname);
                        alertMes($mes,$redirect);
                             
                    }elseif($act=="copyFolder"){
                ?>
                        <div class="copyFolder-show-box">
                                <form action="index.php?act=doCopyFolder" method="post">
                                    <div class="item">
                                        <label>原始名字:</label>
                                        <span><?php echo $filename; ?></span>
                                    </div>

                                    <div class="item">
                                        <label>将文件复制到：</label>
                                        <input type="text" name="distname" placeholder="将文件复制到" />
                                        <input type="hidden" name="path" value="<?php echo $path; ?>" />
                                        <input type='hidden' name='dirname' value='<?php echo $dirname ?>' />
                                    </div>
                                    <input type="submit" value="提交" />
                                </form>
                        </div>    
                <?php
                    }
                ?>        
                </div>     
            <?php        
                }
            ?>

            <h1>慕课网-在线文件管理器</h1>
            <div id="top">
                <ul id="navi">
                    <li>
                        <a href="#" title="主目录">
                        <span class="icon icon-small icon-square">
                            <span class="icon-home"></span>
                        </span>
                    </a>
                    </li>
                    <li>
                        <a href="#" title="新建文件">
                        <span class="icon icon-small icon-square">
                            <span class="icon-file"></span>
                        </span>
                    </a>
                    </li>
                    <li>
                        <a href="#" title="新建文件夹">
                            <span class="icon icon-small icon-square">
                                <span class="icon-folder"></span>
                            </span>
                    </a>
                    </li>
                    <li>
                        <a href="#" title="上传文件">
                            <span class="icon icon-small icon-square">
                                <span class="icon-upload"></span>
                            </span>
                    </a>
                    </li>
                    <li>
                        <a href="#" title="返回上级目录">
                            <span class="icon icon-small icon-square">
                                <span class="icon-arrowLeft"></span>
                            </span>
                    </a>
                    </li>
                </ul>
            </div>
            <?php
            if($allFiles){
            ?> 
               <table class="tbl">
                <thead>
                    <tr>
                        <th width="5%">编号</th>
                        <th width="10%">名称</th>
                        <th width="5%">类型</th>
                        <th width="5%">大小</th>
                        <th width="5%">可读</th>
                        <th width="5%">可写</th>
                        <th width="5%">可执行</th>
                        <th width="10%">创建时间</th>
                        <th width="10%">修改时间</th>
                        <th width="10%">访问时间</th>
                        <th width="30%">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if($allFiles["file"]){
                            $i=1;
                            foreach($allFiles["file"] as $key=>$value){
                                 $p=$path."/".$value;
                    ?>
                                 <tr>
                                        <td><?php echo  $i; ?></td>
                                        <td><?php echo $value; ?></td>
                                        <td>
                                            <?php $src=filetype($p)=="file"?"file_ico.png":"folder_ico.png";?>
                                            <img src="images/<?php echo $src;?>" alt=""  title="文件"/>
                                        </td>
                                        <td>
                                            <?php 
                                                echo transByte(filesize($p));
                                             ?>
                                        </td>
                                        <td>
                                            <?php $src=is_readable($p) ? "correct.png":"error.png";?>
                                            <img src="images/<?php echo $src;?>" alt=""  title="文件"/>
                                            
                                        </td>
                                        <td>
                                            <?php $src=is_writable($p) ? "correct.png":"error.png";?>
                                            <img src="images/<?php echo $src;?>" alt=""  title="文件"/>
                                        </td>
                                        <td>
                                            <?php $src=is_executable($p) ? "correct.png":"error.png";?>
                                            <img src="images/<?php echo $src;?>" alt=""  title="文件"/>
                                        </td>
                                        <td><?php echo date("Y-m-d H:i:s",filectime($p));?></td>
                                        <td><?php echo date("Y-m-d H:i:s",filemtime($p));?></td>
                                        <td><?php echo date("Y-m-d H:i:s",fileatime($p));?></td>
                                        <td>
                                            <!-- 获取文件的拓展名，因为不同文件查看方式不一样，图片就是查看图片啊，文件就是要打开文件 -->
                                            <?php
                                                $ext=pathinfo($p,PATHINFO_EXTENSION);
                                                $imageExt=array("gif","jpg","jpeg","png");
                                                if(in_array($ext, $imageExt)){ //说明是文件
                                            ?>
                                                    <a href="javascript:void(0)" onclick="showDetail('<?php echo $value;?>','<?php echo $p;?>')">
                                                         <img class="small" src="images/show.png" alt="" />
                                                    </a>
                                            <?php
                                                }else{
                                            ?>
                                                    <a href="index.php?act=showContent&path=<?php echo $path; ?>&filename=<?php echo $p;?>">
                                                         <img class="small" src="images/show.png" alt="" />
                                                    </a>
                                                    <a href="index.php?act=editContent&path=<?php echo $path;?>&filename=<?php echo $p;?>">
                                                        <img class="small" src="images/edit.png" alt="" />
                                                    </a>
                                                    
                                            <?php        
                                                }
                                            ?>  
                                               

                                                <a href="index.php?act=renameFile&path=<?php echo $path;?>&filename=<?php echo $p;?>">
                                                    <img class="small" src="images/rename.png" alt="" />
                                                </a>


                                                <a href="index.php?act=copyFile&path=<?php echo $path;?>&filename=<?php echo $p;?>">
                                                    <img class="small" src="images/copy.png" alt="" />
                                                </a>

                                                <a href="index.php?act=cutFile&path=<?php echo $path;?>&filename=<?php echo $p;?>">
                                                    <img class="small" src="images/cut.png" alt="" />
                                                </a>


                                                <a href="javascript:void(0)" onclick="delFile('<?php echo $p;?>','<?php echo $path;?>')">
                                                    <img class="small" src="images/delete.png" alt="">
                                                </a>


                                                <a href="index.php?act=downFile&path=<?php echo $path;?>&filename=<?php echo $p;?>">
                                                    <img class="small" src="images/download.png" alt="">
                                                </a>
                                                
                                                
                                               
                                               
                                                
                                            <!-- 如果是文件就是查看文件，如果是目录就是查看目录的内容 -->
                                            
                                        </td>
                                    </tr>
                    <?php
                                 $i++;
                            }
                    ?>
                   
                    <?php 
                        }
                        if($allFiles["dir"]){
                            $i=($i==null)?1:$i;
                            foreach($allFiles["dir"] as $key=>$value){
                                 $p=$path."/".$value;
                    ?>
                                    <tr>
                                        <td><?php echo  $i; ?></td>
                                        <td><?php echo $value; ?></td>
                                        <td>
                                            <?php $src=filetype($p)=="file"?"file_ico.png":"folder_ico.png";?>
                                            <img src="images/<?php echo $src;?>" alt=""  title="文件"/>
                                        </td>
                                        <td>
                                            <?php 
                                                echo transByte(filesize($p));
                                             ?>
                                        </td>
                                        <td>
                                            <?php $src=is_readable($p) ? "correct.png":"error.png";?>
                                            <img src="images/<?php echo $src;?>" alt=""  title="文件"/>
                                            
                                        </td>
                                        <td>
                                            <?php $src=is_writable($p) ? "correct.png":"error.png";?>
                                            <img src="images/<?php echo $src;?>" alt=""  title="文件"/>
                                        </td>
                                        <td>
                                             <?php $src=is_executable($p) ? "correct.png":"error.png";?>
                                            <img src="images/<?php echo $src;?>" alt=""  title="文件"/>
                                        </td>
                                        <td><?php echo date("Y-m-d H:i:s",filectime($p));?></td>
                                        <td><?php echo date("Y-m-d H:i:s",filemtime($p));?></td>
                                        <td><?php echo date("Y-m-d H:i:s",fileatime($p));?></td>
                                        <td>
                                            <!-- 查看文件 -->
                                            <a href="index.php?path=<?php echo $p; ?>";>
                                                 <img class="small" src="images/show.png" alt="" />
                                            </a>
                                            

                                                <a href="index.php?act=renameFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>">
                                                    <img class="small" src="images/rename.png" alt="" />
                                                </a>


                                                <a href="index.php?act=copyFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>">
                                                    <img class="small" src="images/copy.png" alt="" />
                                                </a>

                                                <a href="index.php?act=cutFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>">
                                                    <img class="small" src="images/cut.png" alt="" />
                                                </a>


                                                <a href="index.php?act=deleteFolder&path=<?php echo $path;?>&dirname=<?php echo $p;?>">
                                                    <img class="small" src="images/delete.png" alt="">
                                                </a>


                                                <a href="index.php?act=downFile&path=<?php echo $path;?>&dirname=<?php echo $p;?>">
                                                    <img class="small" src="images/download.png" alt="">
                                                </a>
                                            
                                            
                                        </td>
                                    </tr>   
                    <?php  
                             $i++;     
                            }
                            
                        }
                     ?>
                    

                </tbody>
            </table>  
           
            <?php
              }else{
            ?>
                <div class="file-nodata-box">
                    目录暂时没有文件
                </div>
            <?php
              }
            ?>
        <div class="dialog-show-box">
            <img src="./images/error.png" />
        </div>
        </body>

    </html>