<div class="form-row">
    <div class="input-group col-md-6">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Filtrar por sedes</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
            <?php
                $query="SELECT * FROM sede"; 
                $execute=mysqli_query($connection,$query);
                
                while ($result=mysqli_fetch_array($execute)) { 

            ?>
                <option value="<?php echo $result['id_sede']; ?>"><?php echo $result['nombre_sede']; ?></option>
            <?php 
                }
            ?>

        </select>
    </div>

    <div class="input-group col-md-6">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect02">Filtrar por jornada</label>
        </div>
        <select class="custom-select" id="inputGroupSelect02">
            <?php
                $query="SELECT * FROM sede"; 
                $execute=mysqli_query($connection,$query);
                
                while ($result=mysqli_fetch_array($execute)) { 

            ?>
                <option value="<?php echo $result['id_sede']; ?>"><?php echo $result['nombre_sede']; ?></option>
            <?php 
                }
            ?>

        </select>
    </div>
</div>