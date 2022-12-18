function uuidv4() {
    return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
        (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
    );
}
$(function() {
    const image = document.getElementById("image");
    image.onchange=function(e){
        const files = e.target.files;
        //console.log("Files", files);
        for (let i = 0; i<files.length;i++)
        {
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                const base64=reader.result;
                // console.log("base64", base64);
                const id=uuidv4();
                const data=`
                    <div class="row">
                        <div class="col-6">
                            <div class="fs-4 ms-2">
                                <label for="${id}" style="cursor: pointer">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </label>
                                <input type="file" class="d-none edit" id="${id}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end fs-4 text-danger me2 remove">
                                <i class="fa fa-times" style="cursor: pointer" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <img src="${base64}" id="${id}_image" width="100%">
                        <input type="hidden" id="${id}_file" value="${base64}" name="images[]">
                    </div>
                   `;
                const item=document.createElement('div');
                item.className="col-md-3 item-image";
                item.innerHTML=data;
                $("#selectImages").before(item);
            });
            const file = files[i];
            reader.readAsDataURL(file);
        }
    }

    //--------------remove item---------
    $("#list_images").on("click", '.remove', function() {
        $(this).closest(".item-image").remove();
    });
    //---------edit item------
    let edit_id=0;
    $("#list_images").on("change", '.edit', function(e) {
        edit_id = e.target.id;
        const reader = new FileReader();
        reader.addEventListener('load',function() {
            const base64=reader.result;
            document.getElementById(`${edit_id}_image`).src=base64;
            document.getElementById(`${edit_id}_file`).value=base64;
        });
        console.log("Edit id", edit_id);
        const file = e.target.files[0];
        reader.readAsDataURL(file);
        this.value="";
    });
});