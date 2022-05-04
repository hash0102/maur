# MBA-MAUR

## アプリ作成の目的
私は小学校4年生から高校3年生までバスケットボールをやっており、その過程でアメリカのプロバスケットボールリーグである『NBA』を観戦することに熱中しました。  
今日では『八村塁』選手や、『渡邊雄太』選手などが『NBA』に挑戦し日本でもだんだん話題になってきています。 
しかし、日本ではまだ『NBA』というものがまだ盛り上がりに欠けており、『NBA』のアプリケーションというものが数少ない状況です。  
そこで、日本でも『NBA』というものを盛り上げるために、NBAの選手に対する個人的な評価を投稿することができたり、他者が特定の選手に対してどのような評価をしているのかなどを見ることができる
アプリケーションを作成致しました。  

## 開発環境
Laravel Framework 6.20.44  
PHP 8.0.15  
MySQL  Ver 15.1 Distrib 10.2.38-MariaDB  
AWS Cloud9  
デプロイ：Herokuを使用   

## 注力した機能

#### jQueryを使用し、チームごとの投稿のみを非同期通信で画面に反映させる機能
![画面収録 2022-05-04 16 21 01 2](https://user-images.githubusercontent.com/98683921/166640231-7ba6aaee-e47a-41e6-bf15-5c4b4f5f4d67.gif)


#### jQueryを使用し、選手名を検索した際に、その選手の情報のみを非同期通信で反映させる機能
![画面収録 2022-05-04 16 44 36](https://user-images.githubusercontent.com/98683921/166643183-4743fcb0-ef65-46dc-b91b-9df312ce5394.gif)


#### jQueryを使用し、いいねを非同期通信で反映させる機能
![画面収録 2022-05-04 17 09 48](https://user-images.githubusercontent.com/98683921/166644346-7ae0c84e-1ac1-46c7-8946-2d452af6c1c9.gif)


#### 選手個人の評価だけでなく今季の１番優秀だと思う選手を各ポジションごとに選出し投稿する機能
![画面収録 2022-05-04 17 05 06](https://user-images.githubusercontent.com/98683921/166643894-350b4781-511a-4d25-95f6-3828a31b9fb3.gif)


#### 各投稿に対し、コメントができる機能
![画面収録 2022-05-04 17 09 48 1](https://user-images.githubusercontent.com/98683921/166645641-86814754-830a-473c-82ff-a0114f04c9a1.gif)


## データ設計
<img width="621" alt="スクリーンショット 2022-05-04 18 42 29" src="https://user-images.githubusercontent.com/98683921/166658596-a27ce646-cb9d-47a7-b0a9-634ab9be805b.png">

・usersテーブルはteamsテーブルと１対多の関係（1つのチームが複数のユーザーを持ち、1人のユーザーが１つのチームを持つ。）

・postsテーブルはusersテーブルと１対多の関係（1人のユーザーが複数の投稿を持ち、1つの投稿が1人のユーザーを持つ。）

・postsテーブルはplayersテーブルと１対多の関係（1人のプレイヤーが複数の投稿を持ち、1つの投稿が1人のプレイヤーを持つ。）

・postsテーブルはteamsテーブルと１対多の関係（1つのチームが複数の投稿を持ち、1つの投稿が1人の選手のチーム情報を持つ。）

・playersテーブルはteamsテーブルと１対多の関係（1つのチームには複数の選手が所属しており、1人のプレイヤーが1つのチームに所属している。）

・rankingsテーブルはusersテーブルと１対多の関係（1人のユーザーが複数のランキング投稿を持ち、1つのランキング投稿が1人のユーザーを持つ。）

・commentsテーブルはusersテーブルと１対多の関係（1人のユーザーが複数のコメントを持ち、1つのコメントが1人のユーザーを持つ。）

・commentsテーブルはpostsテーブルと１対多いの関係（1つの投稿が複数のコメントを持ち、1つのコメントが1つの投稿を持つ。）

## 本アプリケーションに使用したAPI
本アプリケーションでは選手の情報とチームの情報をすべて正確に取得するために外部のAPIを利用してデータを取得致しました。
使用させていただいたAPI：[sportsdata io NBA Data Feed API](https://sportsdata.io/nba-api)
