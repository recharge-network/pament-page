# pip install reportlab
from reportlab.lib.pagesizes import A4
from reportlab.lib.units import mm
from reportlab.lib import colors
from reportlab.pdfgen import canvas

# Output PDF
OUT = "manual_aadhaar_format_editable.pdf"

# Create canvas
c = canvas.Canvas(OUT, pagesize=A4)
width, height = A4

# Draw front box
c.setStrokeColor(colors.black)
c.setLineWidth(1)
# Front card area (left)
c.rect(20*mm, height-120*mm, 90*mm, 55*mm)  # x, y, w, h (y from bottom)
c.setFont("Helvetica-Bold", 12)
c.drawCentredString(65*mm, height-70*mm, "Government of India")

# Form fields - FRONT
form = c.acroForm
c.setFont("Helvetica", 10)

form.textfield(
    name='name', tooltip='Name',
    x=25*mm, y=height-80*mm, width=70*mm, height=7*mm,
    borderStyle='underlined', borderColor=colors.black,
    textColor=colors.black, forceBorder=True
)
c.drawString(25*mm, height-73*mm, "Name")

form.textfield(
    name='dob', tooltip='Date of Birth (DD/MM/YYYY)',
    x=25*mm, y=height-90*mm, width=50*mm, height=7*mm,
    borderStyle='underlined', borderColor=colors.black
)
c.drawString(25*mm, height-83*mm, "DOB (DD/MM/YYYY)")

form.textfield(
    name='gender', tooltip='Gender',
    x=25*mm, y=height-100*mm, width=50*mm, height=7*mm,
    borderStyle='underlined', borderColor=colors.black
)
c.drawString(25*mm, height-93*mm, "Gender")

form.textfield(
    name='address', tooltip='Address',
    x=25*mm, y=height-110*mm, width=80*mm, height=7*mm,
    borderStyle='underlined', borderColor=colors.black
)
c.drawString(25*mm, height-103*mm, "Address")

form.textfield(
    name='aadhaar_no', tooltip='Aadhaar Number (show only last-4 if possible)',
    x=25*mm, y=height-120*mm, width=80*mm, height=7*mm,
    borderStyle='underlined', borderColor=colors.black
)
c.drawString(25*mm, height-113*mm, "Aadhaar No (prefer last-4)")

# Photo box (front)
c.rect(100*mm, height-110*mm, 8*mm, 8*mm)  # tiny marker
c.drawString(100*mm, height-112*mm, "")
c.rect(95*mm, height-115*mm, 13*mm, 18*mm)  # small visual guide
c.drawString(95*mm, height-117*mm, "")

# Draw back box
# Back card area (right)
c.rect(120*mm, height-120*mm, 70*mm, 55*mm)
c.setFont("Helvetica-Bold", 12)
c.drawCentredString(155*mm, height-70*mm, "Unique Identification Authority of India")

# QR placeholder
c.setFont("Helvetica", 10)
form.textfield(
    name='qr_placeholder', tooltip='QR Placeholder (paste image while printing)',
    x=140*mm, y=height-100*mm, width=30*mm, height=20*mm,
    borderStyle='solid', borderColor=colors.black
)
c.drawCentredString(155*mm, height-80*mm, "QR Code")

c.setFont("Helvetica", 10)
c.drawCentredString(155*mm, height-120*mm, "Helpline: 1947 | www.uidai.gov.in")

c.save()
print(f"Created: {OUT}")
