<div class="dropdown">
    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      
        <a class="dropdown-item" href="javascript:void(0)" onClick="editEmp({{ $id }})" data-toggle="modal" data-target="#estate-edit" ><i><span class="fas fa-edit"></span></i> Edit </a>
    
        <a href="javascript:void(0);" id="delete-employee" onClick="deleteEmp({{ $id }})" data-original-title="Delete" class="dropdown-item" ><i><span class="fa fa-trash"></span></i> Delete</a>
      
    </div>
</div>