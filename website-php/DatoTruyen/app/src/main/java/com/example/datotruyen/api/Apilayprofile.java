package com.example.datotruyen.api;

import android.os.AsyncTask;

import com.example.datotruyen.interfaces.Layprofileve;
import java.io.IOException;

import okhttp3.HttpUrl;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;
import okhttp3.ResponseBody;

public class Apilayprofile extends AsyncTask<Void,Void,Void> {
    String data,email;
    Layprofileve layprofileve;

    public Apilayprofile(Layprofileve layprofileve,String email) {
        this.layprofileve = layprofileve;
        this.layprofileve.batdau();
        this.email = email;

    }

    @Override
    protected Void doInBackground(Void... voids) {

        OkHttpClient client = new OkHttpClient();
        HttpUrl httpUrl = HttpUrl.parse("http://192.168.43.231/appandroid/layprofile.php?email="+email);
        Request request = new Request.Builder().url(httpUrl).build();
        data = null;
        try{
            Response response = client.newCall(request).execute();
            ResponseBody body = response.body();
            data = body.string();

        }catch (IOException e){
            data = null;
        }

        return null;
    }

    @Override
    protected void onPostExecute(Void aVoid) {
        if(data==null)
        {
            this.layprofileve.biLoi();
        }else {
            this.layprofileve.ketthuc(data);
        }

    }
}
