<?php
/* 
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS HEADER.
 *
 * Copyright Error: on line 6, column 29 in Templates/Licenses/license-cddl-netbeans-sun.txt
The string doesn't match the expected date/time format. The string to parse was: "11 Mei 14". The expected format was: "MMM d, yyyy". Oracle and/or its affiliates. All rights reserved.
 *
 * Oracle and Java are registered trademarks of Oracle and/or its affiliates.
 * Other names may be trademarks of their respective owners.
 *
 * The contents of this file are subject to the terms of either the GNU
 * General Public License Version 2 only ("GPL") or the Common
 * Development and Distribution License("CDDL") (collectively, the
 * "License"). You may not use this file except in compliance with the
 * License. You can obtain a copy of the License at
 * http://www.netbeans.org/cddl-gplv2.html
 * or nbbuild/licenses/CDDL-GPL-2-CP. See the License for the
 * specific language governing permissions and limitations under the
 * License.  When distributing the software, include this License Header
 * Notice in each file and include the License file at
 * nbbuild/licenses/CDDL-GPL-2-CP.  Oracle designates this
 * particular file as subject to the "Classpath" exception as provided
 * by Oracle in the GPL Version 2 section of the License file that
 * accompanied this code. If applicable, add the following below the
 * License Header, with the fields enclosed by brackets [] replaced by
 * your own identifying information:
 * "Portions Copyrighted [year] [name of copyright owner]"
 *
 * If you wish your version of this file to be governed by only the CDDL
 * or only the GPL Version 2, indicate your decision by adding
 * "[Contributor] elects to include this software in this distribution
 * under the [CDDL or GPL Version 2] license." If you do not indicate a
 * single choice of license, a recipient has the option to distribute
 * your version of this file under either the CDDL, the GPL Version 2 or
 * to extend the choice of license to its licensees as provided above.
 * However, if you add GPL Version 2 code and therefore, elected the GPL
 * Version 2 license, then the option applies only if the new code is
 * made subject to such option by the copyright holder.
 *
 * Contributor(s):
 *
 * Portions Copyrighted Error: on line 42, column 40 in Templates/Licenses/license-cddl-netbeans-sun.txt
The string doesn't match the expected date/time format. The string to parse was: "11 Mei 14". The expected format was: "MMM d, yyyy". Sun Microsystems, Inc.
 */

include 'koneksi.php';
    error_reporting(E_ERROR);
   
 session_start();?>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'css.php';
        include 'lib/fungsi.php';
        include 'lib/library.php';?>
        <title>Materi Perkuliahan | Website Teknik Informatika Universitas Palangka Raya</title>
    </head>
    <body>    
        <?php include 'nav.php';?>
        <?php $gmat="SELECT a.idmateri AS imat, a.materi AS materi, c.nama AS dosen, a.judul AS judul, b.matkul AS matkul, a.tangglUpload AS tanggal FROM materi a LEFT JOIN matkul b ON a.idmatkul = b.idmatkul LEFT JOIN dosen c ON a.idDosen = c.idDosen order by a.tangglUpload DESC";
              $exmat=mysql_query($gmat);
        ?>
                
        <div id="tam" style="box-shadow: 0px 0px 0px 0px;">
            <div class="container" id="putih" style="box-shadow: 0px 0px 3px; padding: 24px;">
            <div class="page-header">
                <h2 class="text-center">Materi Perkuliahan</h2>
            </div>
            <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control" type="text" name="filter" value="" id="filter" placeholder="Cari cepat e.g judul, matkul, dosen..." autocomplete="off"/></div><br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Judul Materi</th>
                            <th>Mata Kuliah</th>
                            <th>Dosen</th>
                            <th>Tanggal Upload</th>
                            <th class=" text-center">Download</th></tr>
                    </thead>
                    
                   
                         <tbody>
                        <?php while ($fetmat=mysql_fetch_array($exmat)){ ?>
                        <tr>
                            <td><?php echo $fetmat[judul];?></td>
                            <td><?php echo $fetmat[matkul];?></td>
                            <td><?php echo $fetmat[dosen];?></td>
                            <td><?php echo tgl_indo($fetmat[tanggal]) ;?></td>
                            <td class="text-center"><a class="btn btn-default" href="dokumen/<?php echo $fetmat[materi];?>"><span class="glyphicon glyphicon-download"></span> Download</a></td>
                        </tr>
                        <?php  } ?>
                    </tbody>
                   
                </table>
            </div>
             <?php 
             if($numpage>$limit){ ?>
             <div class="text-center"><ul class="pagination"><?php
                 if($back>=0){
                     echo "<li><a href=$page?start=$back>PREV</a></li>";              
                 } 
                 $l = 1;
                 for($i = 0; $i < $numpage;$i = $i + $limit){
                     if($i<>$eu){
                         echo "<li><a href=$page?start=$i>$l</a></li>";
                         
                     }else{
                         echo "<li class='active'><a>$l</a></li>";}		
                         $l = $l + 1;
                         
                     }
                     
                     if($thisp<$numpage){
                         echo "<li><a href=$page?start=$next>NEXT</a></li>";
                         
                     }
                     echo "</ul></div>";
			}
                        ?>
        </div></div><br>
        
         <?php           include 'dosen/footer.php';           include 'js.php';?>
    </body></html>
