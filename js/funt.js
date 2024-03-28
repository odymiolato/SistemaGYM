function formu(ind){
                   let form=document.getElementsByClassName("form");
            if (ind==0){
                if (confirm("Desea modificar el empleado")==true) {
                              form[ind].submit();
            } 
            }   
            else if(ind==1){
                if (confirm("Desea eliminar el empleado")==true) {
                              form[ind].submit();
               }
            }
            }
