<?php

Route::group(['prefix'=>'admin', 'as'=>'admin.'], function() {
    get('/', ['as'=>'home', 'uses'=>'Backend\ManageUserController@all']);
    get('users', ['as' => 'user.all', 'uses' => 'Backend\ManageUserController@all']);
    get('user/@{username}/editor', ['as' => 'user.editor', 'uses' => 'Backend\ManageUserController@edit']);
    put('user/update', ['as' => 'user.update', 'uses' => 'Backend\ManageUserController@update']);
    get('groups', ['as' => 'group.all', 'uses' => 'Backend\GroupController@all']);
    put('group/{id}/update', ['as' => 'group.update', 'uses' => 'Backend\GroupController@update']);
    post('group/store', ['as' => 'group.store', 'uses' => 'Backend\GroupController@store']);
    delete('group/delete/{id}', ['as' => 'group.delete', 'uses' => 'Backend\GroupController@delete']);
});