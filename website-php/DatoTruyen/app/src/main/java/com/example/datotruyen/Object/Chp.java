package com.example.datotruyen.Object;

import org.json.JSONException;
import org.json.JSONObject;

public class Chp {
    private String Tap,Ngaydang,idchap,numbert;

    public Chp(JSONObject o) throws JSONException {
        idchap = o.getString("id");
        Tap = o.getString("tap");
        Ngaydang = o.getString("ngaydang");
        numbert = o.getString("numbert");
    }

    public String getNumbert() {
        return numbert;
    }

    public void setNumbert(String numbert) {
        this.numbert = numbert;
    }

    public String getIdchap() {
        return idchap;
    }

    public void setIdchap(String idchap) {
        this.idchap = idchap;
    }

    public Chp(String tap, String ngaydang) {

        this.Tap = tap;
        this.Ngaydang = ngaydang;
    }

    public String getTap() {
        return Tap;
    }

    public void setTap(String tap) {
        this.Tap = tap;
    }

    public String getNgaydang() {
        return Ngaydang;
    }

    public void setNgaydang(String ngaydang) {
        this.Ngaydang = ngaydang;
    }
}
