package com.example.datotruyen.storage;

import android.content.Context;
import android.content.SharedPreferences;

public class SharedPrefManager {

    private static final String SHARED_PREF_NAME ="my_sharef_preff";

    private static SharedPrefManager mInstance;
    private Context mctx;

    private SharedPrefManager(Context mctx){
        this.mctx = mctx;
    }

    public static synchronized SharedPrefManager getInstance(Context mctx){
        if(mInstance == null){
            mInstance = new SharedPrefManager(mctx);
        }
        return mInstance;
    }

    public void saveIdTruyen(String idtruyen){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("idtruyen",idtruyen);
        editor.apply();
    }
    public void saveNoidung(String noidung){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("noidung",noidung);
        editor.apply();
    }
    public void saveTentruyen(String tentruyen){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("tentruyen",tentruyen);
        editor.apply();
    }
    public void savePicture(String picture){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("pictureT",picture);
        editor.apply();
    }
    public void saveUser(String email){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("email",email);
        editor.apply();
    }

    public void saveName(String name){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("name",name);
        editor.apply();
    }
    public void savePass(String pass){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("pass",pass);
        editor.apply();
    }
    public void savePic(String pic){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("pic",pic);
        editor.apply();
    }
    public void saveidchap(String idchap){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("idchap",idchap);
        editor.apply();
    }
    public void savesochap(String sochap){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("sochap",sochap);
        editor.apply();
    }
    public void saveLike(String like){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("like",like);
        editor.apply();
    }
    public void saveunLike(String unlike){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.putString("unlike",unlike);
        editor.apply();
    }
    public String getsoLike(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("like",null);
    }
    public String getsounLike(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("unlike",null);
    }
    public String getsochap(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("sochap",null);
    }
    public String getidchap(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("idchap",null);
    }
    public String gettentruyen(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("tentruyen",null);
    }
    public String getIdtruyen(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("idtruyen",null);
    }
    public String getnoidung(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("noidung",null);
    }
    public String getpictureT(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("pictureT",null);
    }
    public String getpic(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("pic",null);
    }
    public String getemail(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("email",null);
    }
    public String getName(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("name",null);
    }
    public String getPass(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPrefManager.getString("pass",null);
    }
    public void clear(){
        SharedPreferences sharedPrefManager = mctx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPrefManager.edit();
        editor.clear();
        editor.apply();
    }
}
