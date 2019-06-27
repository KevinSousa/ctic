$(window).load(function(){

  
    $('#b10').on('click' ,function(){
      start($('#b10').val());

        fecharmodal();
      
      });
     function fecharmodal(){
         setTimeout(function(){ 
            $('#exemplomodal').modal('hide');
         },500);
     };

       $('#b2').on('click' ,function(){
          start($('#b2').val(),'');   
             fecharmodal();
           
         });
         $('#exemplomodal').modal('show');
  });
            
              

    function start(lab){
  

         if (lab == 'b10') {
              $('#option').val('1');
              $('#fechar').hide();
            }
            if (lab == 'b2') {
              $('#option').val('2');
              $('#fechar').hide()
            }

        
           
               var click = true;      
           
  
       
        var canvas = document.getElementById("renderCanvas");



        function delayCreateScene() {
          var scene = new BABYLON.Scene(engine);
            // Parameters: alpha, beta, radius, target position, scene
          var camera = new BABYLON.ArcRotateCamera("Camera", 0, 0, 10, new BABYLON.Vector3(0, 0, 0), scene);
          // Positions the camera overwriting alpha, beta, radius
          camera.setPosition(new BABYLON.Vector3(1, 1, 1));
          // This attaches the camera to the canvas
          camera.attachControl(canvas);
           // Load the model
         if (lab == 'b10' ) {
               BABYLON.SceneLoader.ImportMesh("", "/scenes/", "lab-b10.obj", scene, function (meshes) {          
                scene.createDefaultCameraOrLight(5, true, true);
                scene.createDefaultEnvironment();
                

                     });
                      
            
                            
           }else if (lab == 'b2') {

                BABYLON.SceneLoader.ImportMesh("", "/scenes/", "lab-b2.obj", scene, function (meshes) {          
                scene.createDefaultCameraOrLight(5, true, true);
                scene.createDefaultEnvironment();
                    
              });
           }
        
          var selected = null;
         

          scene.onPointerObservable.add(function(evt){
            /*
          if(confirm("TEM CERTEZA QUE É ESSE DISPOSITIVO!")){
            alert('true');
          }*/
           
          $('#reverter').on('click', function(){
              var reverter = true;
              click = true;
              var meshesadmin1 =  scene.getMeshByID($('#cham_equip').val());

              meshesadmin1.material.diffuseColor = BABYLON.Color3.Gray();
             $('#next').hide();
          });
        $('#next').on('click', function(){
            $('#teste').hide();
            $('#form-inicial').show();
         });
        if(selected){
          if (reverter == true) {

          selected.material.diffuseColor = BABYLON.Color3.Gray();
                  
          }
          if (reverter == false) {
          selected.material.diffuseColor = BABYLON.Color3.Red();
          selected = null;
          }
        }
    
          if(evt.pickInfo.hit && evt.pickInfo.pickedMesh && evt.event.button === 0 && evt.pickInfo.pickedMesh.id != 'Cube.001' && evt.pickInfo.pickedMesh.id != 'teste_Cube.002' && evt.pickInfo.pickedMesh.id != 'Cube.002_Cube.000' && evt.pickInfo.pickedMesh.id != 'Cube.002_Cube.001' && evt.pickInfo.pickedMesh.id != 'Cube.002_Cube.002'  && evt.pickInfo.pickedMesh.id != 'Cube.000_Cube.000' &&  evt.pickInfo.pickedMesh.id != 'Cube_Cube.003' &&  evt.pickInfo.pickedMesh.id !=  'BackgroundPlane' && evt.pickInfo.pickedMesh.id != 'Cylinder_Cylinder.001' && evt.pickInfo.pickedMesh.id !=  'Text.003_Text.000'  && evt.pickInfo.pickedMesh.id !=  'Text.002_Text.001' && click == true && evt.pickInfo.pickedMesh.id != 'BackgroundSkybox' && evt.pickInfo.pickedMesh.id !=  'Cube.000_Cube.001' && evt.pickInfo.pickedMesh.id != 'Text'  && evt.pickInfo.pickedMesh.id !='Text.003' && evt.pickInfo.pickedMesh.id != 'Text.002_Text.004' && evt.pickInfo.pickedMesh.id != 'Text.001' && confirm('Você confirma que esse objeto apresenta defeito ?')){
            
            var meshesadmin =  scene.getMeshByID(evt.pickInfo.pickedMesh.id);
                  meshesadmin.material.diffuseColor = BABYLON.Color3.Yellow();        
           
            selected = evt.pickInfo.pickedMesh;
            evt.pickInfo.pickedMesh.material.diffuseColor = BABYLON.Color3.Red();
            click = false;
            reverter = false;
                $('#cham_equip').val(evt.pickInfo.pickedMesh.id);
               // alert($('#cham_equip').val());
                
                $('#next').show();
                  $('#reverter').show();
                 

        selected = null;
      }
    }, BABYLON.PointerEventTypes.POINTERUP);
       
        return scene;


        } 
       
        var engine = new BABYLON.Engine(canvas, true, { preserveDrawingBuffer: true, stencil: true });
        var scene = delayCreateScene();

        engine.runRenderLoop(function () {
            if (scene) {
                scene.render();

            }
        });
        // Resize
        window.addEventListener("resize", function () {
            engine.resize();
        });

      }