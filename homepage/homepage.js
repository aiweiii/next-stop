function click_task_2 {
    
}

function task_1() {
    //if user has university, return True
}

function task_2() {
    //if user clicked on task2, return True
}

function task_3() {
    //if user clicked on task 3, return True
}

function get_task_per() {
    var count = 0;
    if (task_1()) {
        count += 1
    } else if (task_2()) {
        count += 1
    } else if (task_3()) {
        count += 1
    }

    var per_value = floor((count / 3) * 100);
    document.getElementById("file").value = per_value;
}