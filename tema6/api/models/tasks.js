const mongoose = require("mongoose");
const Schema =  mongoose.Schema;

const taskShcema = Schema ({

    title : {
        type : String,
        require : true,
    },
    description : {

        type: String,
        require: true

    },
    copleted : {
        type: Boolean,
        requore : true,
        default : false
    },
    ceated_at : {
        type:Date,
        require: true,
        default : Date.now

    }

});
mondule.exports = mongose.model("Task", taskShcema);