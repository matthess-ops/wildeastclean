Dingen uit te zoeken:

- hoe krijg je json makkelijk uit de database en in een php array heen en weer
- eingelijk wil je elke option een id geven. Dit kan makkelijk voor main en sub options maar voor fixed is dit lastig. Ik moet gewoon een aantal functies maken die de laatste id per ding bepaald.

stateController????

NAMING CONVENTIONS
https://webdevetc.com/blog/laravel-naming-conventions/#section_table-columns-names


ROUTES
    -Post = all CRUD routes
    -Log = all CRUD routes 

CONTROLLERS

    PostController all CRUD functions
    LogController all CRUD functions


MIGRATIONS
    -create_post_table = title, post, id create_at, updated_at
    -create_Logs_table = json(log), id create_at, updated_at, startTimestamp, stopTimestamp


SEEDS
    -PostSeeder
    -LogSeeder
    -UserSeeder


MODELS
    -Post = title, post_text ,id created_at, updated_at


PAGES

Dashboard

DATA
 -json(currentLog)
 -json(currentSelectedOptions) = 4 groups to track data for, mainActivity, subActivity, scaledActivty, fixedActivity, experiment
 -json(todayLogs) = json array of all the logs of today.
 -json(getAllOptions) =  mainActivities, subActivity, scaledActivity and fixedActivity.
 -bool(timerRunning)

COMPONENTS

Timer component // blade and javascript
- once =  If timerRunning == true, get startTimestamp of currentLog and calculate the elapsed time. Then update the html element
- every second= update the timer every 1 minute

SelectedOptions component //  blade
-once = create all the needed selections for the json(getAllOptions)
-once = set the selected option for the all the selection to the corresponding currentSelectedOptions

Post component //

html text input title
html text input textarea
submit button --> route()


