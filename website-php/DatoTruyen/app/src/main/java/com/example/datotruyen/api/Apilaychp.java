package com.example.datotruyen.api;

import android.os.AsyncTask;

import com.example.datotruyen.interfaces.LayChpve;

import okhttp3.HttpUrl;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;
import okhttp3.ResponseBody;

import java.io.IOException;

public class Apilaychp extends AsyncTask<Void,Void,Void> {
    String data,idt;
    LayChpve layChpve;


    public Apilaychp(LayChpve layChpve,String idt ) {
        this.layChpve = layChpve;
        this.layChpve.batdau();
        this.idt = idt;
    }

    protected Void doInBackground(Void... voids) {
        OkHttpClient client = new OkHttpClient();
        HttpUrl localUrl = HttpUrl.parse("http://192.168.43.231/appandroid/laychp.php?id="+idt);
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
            this.layChpve.biLoi();
        }else{
            this.layChpve.ketthuc(data);
        }

    }

}
