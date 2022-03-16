$(document).ready(function () {
    
    $("#manage_category .edit").click(function (e) {
        $id = $(this).parent().parent().parent().attr("id");
        $category = $(this).parent().parent().siblings()[1].innerHTML;
        $desc = $(this).parent().parent().siblings()[2].innerHTML;

        $idInput = $("#update_category_modal").find("input[name=id]");
        $categoryInput = $("#update_category_modal").find("input[name=category]");
        $descInput = $("#update_category_modal").find("textarea[name=category-desc]");

        $idInput.val($id);
        $categoryInput.val($category);
        $descInput.val($desc);
    });

    $("#manage_subcategory .edit").click(function (e) {
        $id = $(this).parent().parent().parent().attr("id");
        $category = $(this).parent().parent().siblings()[1].innerHTML;
        $subcategory = $(this).parent().parent().siblings()[2].innerHTML;
        $desc = $(this).parent().parent().siblings()[3].innerHTML;

        $idInput = $("#update_subcategory_modal").find("input[name=id]");
        $categorySelect = $("#update_subcategory_modal").find("select[name=category]");
        $subcategoryInput = $("#update_subcategory_modal").find("input[name=subcategory]");
        $descInput = $("#update_subcategory_modal").find("textarea[name=category-desc]");

        $selectionList = $categorySelect.children();

        $selectionList.each(i => {
            if($selectionList[i].innerHTML === $category) {
                $($selectionList[0]).removeAttr("selected");
                $($selectionList[i]).attr("selected", "selected");
            }
        });

        $idInput.val($id);
        $subcategoryInput.val($subcategory);
        $descInput.val($desc);
    });

    $("#manage_post .edit, #trash_post .edit").click(function (e) {
        $id = $(this).parent().parent().parent().attr("id");
        $title = $(this).parent().parent().siblings()[0].innerHTML;
        $category = $(this).parent().parent().siblings()[1].innerHTML;
        $subcategory = $(this).parent().parent().siblings()[2].innerHTML;

        $idInput = $("#update_post_modal").find("input[name=id]");
        $titleInput = $("#update_post_modal").find("input[name=title]");
        $categorySelect = $("#update_post_modal").find("select[name=category]");
        $subcategorySelect = $("#update_post_modal").find("select[name=subcategory]");

        $selectionList = $categorySelect.children();

        $selectionList.each(i => {
            if($selectionList[i].innerHTML === $category) {
                $($selectionList[0]).removeAttr("selected");
                $($selectionList[i]).attr("selected", "selected");
            }
        });

        $selectionList = $subcategorySelect.children();

        $selectionList.each(i => {
            if($selectionList[i].innerHTML === $subcategory) {
                $($selectionList[0]).removeAttr("selected");
                $($selectionList[i]).attr("selected", "selected");
            }
        });

        $idInput.val($id);
        $titleInput.val($title);
    });


});