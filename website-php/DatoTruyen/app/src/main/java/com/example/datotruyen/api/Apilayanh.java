package com.example.datotruyen.api;

import android.os.AsyncTask;

import com.example.datotruyen.DoctruyenActivity;
import com.example.datotruyen.interfaces.Layanhve;


import java.io.IOException;

import okhttp3.HttpUrl;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;
import okhttp3.ResponseBody;

public class Apilayanh extends AsyncTask<Void,Void,Void> {
    String data, idchap;
    Layanhve layanhve;


    public Apilayanh(Layanhve layanhve , String idchap) {
        this.layanhve = layanhve;
        this.layanhve.batdau();
        this.idchap = idchap;
        ;
    }



    protected Void doInBackground(Void... voids) {

        OkHttpClient client = new OkHttpClient();
        HttpUrl localUrl = HttpUrl.parse("http://192.168.43.231/appandroid/layanh.php?idchap="+idchap);
        Request request = new Request.Builder().url(localUrl).build();
        data=null;
        try {
            Response response = client.newCall(request).execute();
            ResponseBody body = response.body();
            data = body.string();

        }catch (IOException e){
            data = null;
        }


        return null;
    }


    protected void onPostExecute(Void aVoid) {
        if(data==null)
        {
            this.layanhve.biLoi();
        }else{
            this.layanhve.ketthuc(data);
        }

    }

}
