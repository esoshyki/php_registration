### Приложение для регистрации, аутентификации и авторизации пользователя на PHP.

Я не работал до этого на PHP совсем, но пока разбирался, так меня затянуло, что прямо очень )

#### Описание задания.

 * Валидация формы и авторизация это два разных класса. Класс валидатор собирает ошибки формы и возвращает их
  браузеру со статусом (400). За отображение ошибок и успеха в браузере отвечает класс **Form Control**, 
  находящийса в папке js. Он "рассовывает" ошибки по нужным полям, редиректит после входа или выхода и т. о.

 * Если валидация прошла успешно, создаем экземпляр класса **Auth**, в котором соответственно есть методы **signUp** и **signIn**;
   В этих методах создается класс **Database**, который отвечает за добавление, изменение или удаление юзеров из баззы данных.
   И соответственно сам клас **User**. Все по **SOLID**. Один класс - одна задача.

 * Проверку на ajax запрос я толком в инете так и не нашел, хотя там много чего пишут. Ну я сделал папочку **./php/security**
    а в ней файлик **disableGetRequest.php**. Там я проверяю **HTTP_SEC_FETCH_MODE**. По идее, fetch запросы наши приходят с 
    одного origin, значит значение **HTTP_SEC_FETCH_MODE** должно быть **no-cors** иначе, выходим из выполнения.

 * Сохранение состояния авторизации я сделал просто добавил **userName** и **userEmail** в **_$SESSION**;
  В принципе [ВОТ ТУТ ТАК МОЖНО )](https://htmlacademy.ru/tutorial/php/sessions-cookies)

 * В **.htaccess** закрыт доступ к json файлам а также настроен убраны окончания **.php** со страниц.



  


