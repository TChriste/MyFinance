<?php 
if(!isLogged()){
   header('Location: ./'); 
}else{
    $id_cat = null;
    if(isset($_POST['submit'])){
        $search = $_POST['search'];
        if(isset($_POST["category"])) {
            $id_cat = $_POST['category'];
            $allExpenses = getAllExpenses($search,$id_cat);
        }else{
            $allExpenses = getAllExpenses($search);
        }
        
       
    }else{
        $allExpenses = getAllExpenses(); 
    }
    
?>
<div class="row" style="margin:1%;">
    <div class="col-md-12">
        <h2>Historiques des dépenses : </h2>
    </div>
</div>
<div class="row" style="margin:1%;">
   <form class="form-inline" method="post">
      <div class="form-group">
        <label class="sr-only" for="exampleInputAmount">Description</label>
        <div class="input-group">
          <input type="text" name="search" class="form-control" id="exampleInputAmount" placeholder="Recherche">
          <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
        </div>
        <div class="input-group">
             <div class="input-group-addon"><span class="glyphicon glyphicon-pushpin"></span></div>
            <select name="category" class="form-control">
                  <option value="0">-- Toutes les catégories -- </option>
                  <?php echo getCategories($id_cat) ?>
            </select>   
        </div>  
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
             <select class="form-control">
                 <?php 
                    for ($m=1; $m<=12; $m++) {
                        echo '  <option value="' . $m . '">' . date('F', mktime(0,0,0,$m)) . '</option>';
                    }
                 ?>
                 
            </select>   
        </div>
        <div class="input-group">
            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
             <select class="form-control">
                  <option>2016</option>
                  <option>2015</option>
                  <option>2014</option>
                  <option>2013</option>
                  <option>2012</option>
            </select>   
        </div>
          
          
          
      </div>
      <button name="submit" type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>

<div class="row" style="margin:1%;">
    <div class="col-md-12">
        <table class="table" >
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Catégorie</th> 
                    <th>Date</th>
                    <th>Somme</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php echo $allExpenses; ?> 
            </tbody>
        </table>
    </div>
</div>
<?php }?>