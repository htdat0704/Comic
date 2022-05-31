package com.example.datotruyen.Object;

import org.json.JSONException;
import org.json.JSONObject;

public class Truyen {
    private String ten,chap,anh,idt,txtnoidung,luotxem,likene,unlike;

    public Truyen(JSONObject o) throws JSONException {
        luotxem = o.getString("luotxem");
        idt = o.getString("id");
        ten = o.getString("ten");
        chap = o.getString("chap");
        anh = o.getString("anh");
        txtnoidung = o.getString("noidung");
        likene = o.getString("likene");
        unlike = o.getString("unlike");
    }

    public Truyen(String ten, String chap, String anh,String txtnoidung,String luotxem,String likene,String unlike) {
        this.likene = likene;
        this.unlike = unlike;
        this.luotxem = luotxem;
        this.ten = ten;
        this.chap = chap;
        this.anh = anh;
        this.txtnoidung=txtnoidung;
    }

    public String getLikene() {
        return likene;
    }

    public void setLikene(String likene) {
        this.likene = likene;
    }

    public String getUnlike() {
        return unlike;
    }

    public void setUnlike(String unlike) {
        this.unlike = unlike;
    }

    public String getLuotxem() {
        return luotxem;
    }

    public void setLuotxem(String luotxem) {
        this.luotxem = luotxem;
    }

    public String getTxtnoidung() {
        return txtnoidung;
    }

    public void setTxtnoidung(String txtnoidung) {
        this.txtnoidung = txtnoidung;
    }

    public String getIdt() {
        return idt;
    }

    public void setIdt(String idt) {
        this.idt = idt;
    }

    public String getTen() {
        return ten;
    }

    public void setTen(String ten) {
        this.ten = ten;
    }

    public String getChap() {
        return chap;
    }

    public void setChap(String chap) {
        this.chap = chap;
    }

    public String getAnh() {
        return anh;
    }

    public void setAnh(String anh) {
        this.anh = anh;
    }
}
