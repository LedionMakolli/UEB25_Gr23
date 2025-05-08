 // drag & drop

        const featureList = document.getElementById("feature-list");
        let draggedItem = null;

        featureList.addEventListener("dragstart", (event) => {
          draggedItem = event.target.closest(".feature__card");
          event.target.style.opacity = 0.5;
        })

        featureList.addEventListener("dragover", (event) => {
          event.preventDefault();
        })

        featureList.addEventListener("drop", (event) => {
         event.preventDefault();
         
         let targetCard = event.target.closest(".feature__card");
         if(targetCard && draggedItem !== event.target){
          const draggedIndex = Array.from(featureList.children).indexOf(draggedItem);
          const targetIndex = Array.from(featureList.children).indexOf(event.target);

          if(draggedIndex < targetIndex){
            featureList.insertBefore(draggedItem, targetCard.nextSibling);
          }else{
            featureList.insertBefore(draggedItem,targetCard);
          }
         }
         draggedItem.style.opacity = 1;
        });

        featureList.addEventListener("dragend", (event) => {
          if(draggedItem){
            draggedItem.style.opacity = 1;
          }
        });