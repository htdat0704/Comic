package com.example.datotruyen.api;

import android.os.AsyncTask;

import com.example.datotruyen.interfaces.Laytruyenve;
import okhttp3.HttpUrl;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;
import okhttp3.ResponseBody;

import java.io.IOException;

public class Apilaytruyen extends AsyncTask<Void,Void,Void> {
    String data;
    Laytruyenve laytruyenve;

    public Apilaytruyen(Laytruyenve laytruyenve) {
        this.laytruyenve = laytruyenve;
        this.laytruyenve.batdau();

    }

    @Override
    protected Void doInBackground(Void... voids) {
        OkHttpClient client = new OkHttpClient();
        HttpUrl localUrl = HttpUrl.parse("http://192.168.43.231/appandroid/laytruyen.php");
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

    @Override
    protected void onPostExecute(Void aVoid) {
        if(data==null)
        {
            this.laytruyenve.biLoi();
        }else{
            this.laytruyenve.ketthuc(data);
        }
        super.onPostExecute(aVoid);
    }
}
