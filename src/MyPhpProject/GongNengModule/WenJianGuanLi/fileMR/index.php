<?php

  require_once 'file.func.php';
  $path="./file";
  $allFiles=readDirectory($path);
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
        <link rel="stylesheet" type="text/css" href="style.css">

        <body>
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
                                            <img class="small" src="images/show.png" alt="" />
                                            <img class="small" src="images/edit.png" alt="" />
                                            <img class="small" src="images/rename.png" alt="" />
                                            <img class="small" src="images/copy.png" alt="" />
                                            <img class="small" src="images/cut.png" alt="" />
                                            <img class="small" src="images/delete.png" alt="">
                                            <img class="small" src="images/download.png" alt="">
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
                                            <a href="#"><img class="small" src="images/show.png" alt="" /></a>
                                            <a href="#"></a>
                                            
                                            <img class="small" src="images/edit.png" alt="" />
                                            <img class="small" src="images/rename.png" alt="" />
                                            <img class="small" src="images/copy.png" alt="" />
                                            <img class="small" src="images/cut.png" alt="" />
                                            <img class="small" src="images/delete.png" alt="">
                                            <img class="small" src="images/download.png" alt="">
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
        </body>

    </html>