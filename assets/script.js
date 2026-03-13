document.querySelectorAll(".checkbox").forEach(function(box){

    box.addEventListener("change", function(){

        let taskId = this.dataset.id;
        let status = this.checked ? 1 : 0;


        fetch("/todolist/tasks/edit_status.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "id=" + taskId + "&status=" + status
        });

    });

});