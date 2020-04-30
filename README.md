# LearnWebProgrammingWithShohan
LearnWebProgrammingWithShohan Group main repository where everyone will perform git activities and future projects along with task results

## Group Tasks

| #  | Task | Status |
| ------------- | :--- | ------------- |
| 1  | Git Intro  | :x:  |
| 2  | Git Intermediate  | :x:   |
| 3  | Php OOP mysql Project  | :heavy_check_mark:  |

## Project Folder Strcuture ( Under Development )

- First after cloning - create a new folder with your username , example - shohan494
- Inside the folder try to create a FEATURE.MD/TASK.MD and try to note down something related to your task/feature
- In the same folder create another folder by naming it as the same as your feature name which you are going to develop

```
username
|── feature-name
└── FEATURE.MD/TASK.MD
```


## How to Contribute


##### _EACH TEAM MEMBER MUST CLONE THE PROJECT — DO NOT FORK IT!_
Alright, now let's make a branch and code.

## Setting Up Your Branches

*Before creating a new branch, make sure you are up to date with the master branch. Simply:*
```sh
$ git pull origin master
```

Now, this is where it gets messy. Don’t you ever, ever, ever, ever work on the master branch. Let’s refresh your memories on how to make branches.
```sh
$ git checkout -b branchName
```
>Tip: Each branch should be made based on each feature, not page. For example, some branches could be:
fbAuth,
editUserInfo,
addingGulp,
etc.

Now, after you make a branch, it's only created locally. So, we need to make it exist on GitHub for your team members to see and for you to be able to push to it:

```sh
$ git push --set-upstream origin sameBranchName
```
This will make your branch visible on GitHub to other team members and sets the upstream to push to your specific branch. Double check to make sure your new branch is there by going to your organization on GitHub, then to branches.

## Adding, Committing, and Pushing
##### If you've completed the steps above, you're ready to code on your branch now!

*You add and commit your files the same way you've always done it when you’re on a branch, but:*

>BEFORE YOU EVER COMMIT, MAKE SURE YOU ARE ON YOUR BRANCH, NOT MASTER.

After you add and commit your files push your changes to your branch on GitHub:
```sh
$ git push origin sameBranchName
```
##### Now, if you’re ready to make a pull request in order to merge your branch's code with Master, head over to GitHub:
- _Your Organization >> Branches >> Your Branch >> Compare & Pull Request_

- NEVER MERGE YOUR OWN PULL REQUEST UNTIL SOMEONE IN YOUR GROUP APPROVES IT!

## Merging Master Changes With Your Branch
Double check to make sure you are up to date with the master branch. But first, you must commit your changes on your branch. Before applying outside changes, you should get your own work in good shape and committed locally, so it will not be clobbered if there are conflicts.

```sh
# on your branch, git add
$ git commit -m “blah"
$ git checkout master
$ git pull origin master
```
Now, merge your branch with the master. There could possibly be conflicts if you have not been keeping up with the master, but no worries, it’s usually nothing that can’t be fixed in a few minutes [……hopefully].

```sh
$ git checkout branchName
$ git merge master
```

#### If you tried a merge which resulted in complex conflicts and want to start over, you can recover:

```sh
On your branch
$ git merge --abort
```

## Deleting Branches
When you are finished with a feature, and everything has been merged with the master branch via pull request, you should delete your branch associated with that feature locally and on GitHub to keep things clean and organized. You can delete it manually on GitHub by going to the organization then to branches, or you can delete it from GitHub by writing:

```sh
$ git push origin :BranchName
```
The difference from before is simply the colon :

To delete your branch locally:

```sh
$ git branch -d branchName
```

To FORCE branch deletion locally:

```sh
$ git branch -D branchName
```

### _Important Reminders:_

- Tell your Team every time a pull request has been merged with master. Don’t let your team members fall behind Master.
- Pull often, just to be sure. Even if no one has told you about changes on master, pull anyways. It doesn’t hurt.
- There is a visual of how far behind your branch is from Master on GitHub under Branches.
- Double check with team members before merging.
- Make sure you are on a branch before you start coding. Get in the habit of checking.


#### learn your own .......
