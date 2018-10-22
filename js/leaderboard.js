console.log("Leaderboard");

// CSV Parser from https://stackoverflow.com/questions/23762822/javascript-loading-csv-file-into-an-array
function requestCSV(f,c){return new CSVAJAX(f,c);};
function CSVAJAX(filepath,callback)
{
    this.request = new XMLHttpRequest();
    this.request.timeout = 10000;
    this.request.open("GET", filepath, true);
    this.request.parent = this;
    this.callback = callback;
    this.request.onload = function()
    {
        var d = this.response.split('\n'); /*1st separator*/
        var i = d.length;
        while(i--)
        {
            if(d[i] !== "")
                d[i] = d[i].split(','); /*2nd separator*/
            else
                d.splice(i,1);
        }
        this.parent.response = d;
        if(typeof this.parent.callback !== "undefined")
            this.parent.callback(d);
    };
    this.request.send();
};

// Set up variables
// These should come back as arrays
const michiganCallRecords102018 = requestCSV("./js/raw-leaderboard-data/MichiganCallRecords102018.csv");
const utahCallRecords102018 = requestCSV("./js/raw-leaderboard-data/UtahCallRecords102018.csv");
const michiganCalls = requestCSV("./js/raw-leaderboard-data/MichiganCalls.csv");
const utahCalls = requestCSV("./js/raw-leaderboard-data/UtahCalls.csv");

// Debug logs
console.log(michiganCallRecords102018);
console.log(utahCallRecords102018);
console.log(michiganCalls);
console.log(utahCalls.response[0].value);
